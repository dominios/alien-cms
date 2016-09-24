<?php

namespace Application\Models\Utils;

use Closure;

/**
 * Converts entities between JSON and PHP objects representation.
 */
class Serializer
{

    /**
     * Converts object instance into JSON.
     * All of the class properties are also serialized recursively.
     * @param JsonInterface $object object to serialize.
     * @return array JSON representation.
     * @todo error handling (if any)
     * @todo handling non JsonInterface objects coversion (or error)
     */
    public function toJson (JsonInterface $object)
    {

        $reader = function & ($object, $property = null) {
            $value = & Closure::bind(function & () use ($property) {
                return $property ? $this->$property : get_object_vars($this);
            }, $object, $object)->__invoke();
            return $value;
        };

        $ret = [];
        $props = array_keys($reader($object));

        foreach ($props as $prop) {
            $getter = "get" . ucfirst($prop);
            $value = call_user_func([$object, $getter]);
            if ($value instanceof JsonInterface) {
                $ret[$prop] = $this->toJson($value);
            } else {
                $ret[$prop] = $value;
            }
        }
        
        return $ret;
    }

    /**
     * Creates object instance from JSON.
     * The JSON must have <code>type</code> property set with existing class name,
     * otherwise exception will be thrown.
     * If any sub-object has its type set, it's unserialized recursively.
     * @param array $json json to unserialize.
     * @return mixed instance of class defined in <code>type</code> property.
     * @todo add optional validation.
     * @todo specific exception type.
     */
    public function fromJson ($json)
    {
        // @todo add validation here
        // now we're assuming JSON is OK - no further error handling

        if (!is_array($json)) {
            throw new \InvalidArgumentException("Cannot parse other objects than array.");
        }

        $className = $json['type'];
        $object = new $className;

        foreach ($json as $key => $value) {
            $setter = "set" . ucfirst($key);
            if ($key === 'id' && $object instanceof Identified) {
                $object->setId($value);
            } else if (is_array($value)) {
                $type = @$value['type'];
                if ($type) {
                    call_user_func([$object, $setter], $this->fromJson($value));
                } else {
                    call_user_func([$object, $setter], $value);
                }
            } else {
                call_user_func([$object, $setter], $value);
            }
        }

        return $object;
    }
}