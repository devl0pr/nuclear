<?php


namespace App\Util;


class Money
{
    public static function format($amount)
    {
        if(!is_numeric($amount)) {
            $amount = 0;
        }

        return $amount; //number_format($amount, 2, '.', ',');
    }


}