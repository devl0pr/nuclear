<?php


namespace App\Helper\Objects;


class DynamicSetter
{
    public static function set($object, $data, $override = [], $exclude = [])
    {
        foreach ($data as $k => $v) {

            if (array_key_exists($k, $override)) {
                $k = $override[$k];
            }

            if (in_array($k, $exclude)) {
                continue;
            }

            $methodName = 'set' . ucfirst($k);

            if (!method_exists($object, $methodName)) {
                throw new \Exception("Undefined method $methodName");
            }

            $object->{$methodName}($v);
        }

        return $object;
    }
}
