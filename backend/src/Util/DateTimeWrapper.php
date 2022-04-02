<?php
/**
 * Created by PhpStorm.
 * User: b.shamsi
 * Date: 07.10.2019
 * Time: 20:12
 */

namespace App\Util;

class DateTimeWrapper
{
    /**
     * @var \DateTimeInterface
     */
    private $dateTime;

    public function __construct(\DateTimeInterface $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    public function in(\DateTimeInterface $startDate, \DateTimeInterface $endDate): bool
    {
        return $this->dateTime >= $startDate && $this->dateTime <= $endDate;
    }

    public function isTheSameDay(\DateTimeInterface $date)
    {
        return $this->dateTime->format('dmY') === $date->format('dmY');
    }

    public function getDateTime()
    {
        return $this->dateTime;
    }

    public static function firstDayOfCurrentMonth()
    {
        $datetime = new \Datetime();
        $datetime->setDate($datetime->format('Y'), $datetime->format('m'), 1);

        return new DateTimeWrapper($datetime);
    }

    public static function cmpDates($datetime1, $datetime2)
    {
        if ($datetime1 == $datetime2) {
            return 0;
        }

        return ($datetime1 < $datetime2) ? -1 : 1;
    }
}