<?php

namespace Application\Models\Utils;

use Closure;
use InvalidArgumentException;

/**
 * Converts entities between JSON and PHP objects representation.
 */
class Serializer
{

    /**
     * Accesses the objects property and can modify it.
     * With this function, it's possible to access any property of the object, including private
     * and protected.
     *
     * If only first <code>$object</code> parameter given, values of all its properties are returned.
     *
     * If also the second <code>$property</code> argument is given, ony value for that particular
     * property is returned.
     *
     * If third argument is given, it will set property with name of <code>$property</code>
     * to given <code>$value</code>.
     *
     * @param mixed $object any type of object.
     * @param string $property [optional] particular property name to access.
     * @param mixed $value [optional] value to set for the particular property.
     * @throws InvalidArgumentException when first argument is not an object.
     * @return mixed accessed property value.
     */
    private function accessProperty ($object, $property = null, $value = null)
    {
        if (!is_object($object)) {
            throw new InvalidArgumentException("Only objects can be accessed.");
        }
        $reader = function & ($object, $property = null, $value = null) {
            $value = &Closure::bind(function & () use ($property, $value) {
                if ($value && property_exists($this, $property)) {
                    $this->$property = $value;
                    return $this->$property;
                } else {
                    return $property ? $this->$property : get_object_vars($this);
                }
            }, $object, $object)->__invoke();
            return $value;
        };

        return $reader($object, $property, $value);
    }

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
        $ret = [];
        $props = array_keys($this->accessProperty($object));

        foreach ($props as $prop) {
            $value = $this->accessProperty($object, $prop);
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
            throw new InvalidArgumentException("Cannot parse other objects than array.");
        }

        $className = $json['type'];

        $object = new $className();

        foreach ($json as $key => $value) {
            if ($key === 'id' && $object instanceof Identified) {
                $this->accessProperty($object, 'id', $value);
            } else if (is_array($value)) {
                $type = @$value['type'];
                if ($type) {
                    $this->accessProperty($object, $key, $this->fromJson($value));
                } else {
                    $this->accessProperty($object, $key, $value);
                }
            } else {
                $this->accessProperty($object, $key, $value);
            }
        }

        return $object;
    }
}