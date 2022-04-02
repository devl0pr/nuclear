<?php

namespace App\Util;

class Number
{
    public static function cutAfterDot($number, $afterDot = 4)
    {
        if (is_null($number)) {
            return null;
        }

        $number = (string)$number;

        $numberParts = explode('.', $number);

        if (1 === count($numberParts)) {
            return $number;
        }

        $fractionPartDigits = [];

        $len = strlen($numberParts[1]);

        if ($len > $afterDot) {
            $len = $afterDot;
        }

        for ($i = 0; $i < $len; ++$i) {
            $fractionPartDigits[] = $numberParts[1][$i];
        }

        $result = $numberParts[0] . '.' . implode('', $fractionPartDigits);

        return rtrim(rtrim($result, '0'), '.)');
    }
}