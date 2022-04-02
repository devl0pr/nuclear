<?php


namespace App\Helper\Converter;


class Converter
{
    public static function bitwiseToArray($bit, $integerArray)
    {
        $array = [];

        foreach ($integerArray as $int) {
            $value = $bit & $int;
            if ($value > 0) {
                $array[] = $value;
            }
        }

        return $array;
    }

    public static function arrayToBitwise($types)
    {
        $bit = array_reduce($types, function ($a, $b) {
            return $a | $b;
        }, 0);

        return $bit;
    }

    /*
     * convertToBytes('100MB')
     * convertToBytes('180KB')
     */
    public static function convertToBytes(string $from): ?int {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $number = substr($from, 0, -2);
        $suffix = strtoupper(substr($from,-2));

        //B or no suffix
        if(is_numeric(substr($suffix, 0, 1))) {
            return preg_replace('/[^\d]/', '', $from);
        }

        $exponent = array_flip($units)[$suffix] ?? null;
        if($exponent === null) {
            return null;
        }

        return $number * (1024 ** $exponent);
    }
}
