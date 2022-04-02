<?php


namespace App\Util;


class Math
{
    public static function subPercent($amount, $percent)
    {
        $onePercentAmount = bcdiv($amount, 100);
        return bcsub($amount, bcmul($onePercentAmount, $percent));
    }
}