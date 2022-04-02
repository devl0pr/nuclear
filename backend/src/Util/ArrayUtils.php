<?php
/**
 * Created by PhpStorm.
 * User: b.shamsi
 * Date: 29.08.2019
 * Time: 14:06
 */

namespace App\Util;


class ArrayUtils
{
    public static function defaults(array $array, array $defaultValues)
    {
        foreach ($defaultValues as $key => $defaultValue) {
            if (!array_key_exists($key, $array)) {
                $array[$key] = $defaultValue;
            }
        }

        return $array;
    }

    /**
     * Adds key to each map of an array
     *
     * @param string $key
     * @param mixed $value
     * @param array $array
     *
     * @return array
     */
    public static function addKeyForEachMap($key, $value, $array)
    {
        foreach ($array as &$element) {
            $element[$key] = $value;
        }

        return $array;
    }

    public static function sortByKey($key, $order = 'asc', &$array)
    {
        $valuesSortedBy = array_column($array, $key);

        $orderMultisort = $order === 'asc' ? SORT_ASC : SORT_DESC;

//        if (count($valuesSortedBy) !== count($array)) {
//            return;
//        }

        array_multisort($valuesSortedBy, $orderMultisort, $array);
    }

    public static function getDuplicates($array)
    {
        return array_unique(array_diff_assoc($array,array_unique($array)));
    }
}