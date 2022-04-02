<?php


namespace App\Helper\Arrays;


class ArrayStructure
{
    /*
     * set array column as a key
     */
    public static function reKey($array, $column = null)
    {
        $i = -1;

        $newArray = [];

        foreach ($array as $key => $value) {
            if($column === null) {
                $i++;
            }

            $newArray[$column === null ? $i : $value[$column]] = $value;
        }

        return $newArray;
    }


    /**
     * @param array|null $array     Desired array for modification
     * @param array $keys           Keys for modification value
     * @param string $callback      Callback function
     *
     * This function can modify array with $callback($arrayVal[$key]) style
     * But for sake of Php genesis we used call_user_func() method here
     */
    public static function modifyArrayByKeys(?array &$array, array $keys, string $callback)
    {
        if ($array) {
            foreach ($array as &$arrayVal) {
                foreach ($keys as $key) {
                    # $arrayVal[$key] = $callback($arrayVal[$key]);
                    $arrayVal[$key] = call_user_func($callback, $arrayVal[$key]);
                }
            }
        }
    }

    /**
     * @param $array
     * @param callable $predicate
     * @return null
     */
    public static function findFirst($array, callable $predicate)
    {
        foreach ($array as $element) {
            if (true === $predicate($element)) {
                return $element;
            }
        }

        return null;
    }
}
