<?php
/**
 * Created by PhpStorm.
 * User: b.shamsi
 * Date: 11.03.2020
 * Time: 9:38
 */

namespace App\Helper;

use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Type;

class ConstraintRegistry
{
    private static $constraints = null;

    private static function getConstraints() {
        if (is_null(self::$constraints)) {
            self::initConstraints();
        }

        return self::$constraints;
    }

    private static function initConstraints() {
        self::$constraints = [
            'arrayOfDigits' => [
                new Type(['type' => 'array']),
                new All(['constraints' => [new Type("digit")]])
            ]
        ];
    }

    public static function get($key) {
        $constraints = self::getConstraints();
        if (!array_key_exists($key, $constraints)) {
            throw new \Exception(sprintf('Constraint with key %s is not defined'));
        }

        return $constraints[$key];
    }
}