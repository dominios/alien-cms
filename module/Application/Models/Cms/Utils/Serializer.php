<?php

namespace Application\Models\Cms\Utils;

use Closure;

class Serializer
{

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