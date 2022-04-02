<?php


namespace App\Util;

/**
 * Class Optional
 * @package App\Util
 *
 * The class is a PHP port of the partially implemented java.util.Optional class in Java
 * @see http://docs.oracle.com/javase/8/docs/api/java/util/Optional.html java.util.Optional API docs
 */
class Optional
{
    /**
     * @var Optional Common empty object
     */
    private static $emptyOptional = null;

    /**
     * @var Optional
     */
    private $wrappedValue = null;

    private function __construct($wrappedValue)
    {
        $this->wrappedValue = $wrappedValue;
    }

    private static function getEmpty(): Optional
    {
        if (is_null(self::$emptyOptional)) {
            self::$emptyOptional = new Optional(null);
        }

        return self::$emptyOptional;
    }

    /**
     * Creates new Optional object if {@code $wrappedValue} is not null
     *
     * @param $wrappedValue mixed
     * @return Optional
     */
    public static function ofNullable($wrappedValue): Optional
    {
        return is_null($wrappedValue) ? self::getEmpty() : new self($wrappedValue);
    }

    public function isPresent()
    {
        return $this->wrappedValue !== null;
    }

    public function ifPresent(callable $callback)
    {
        return $this->isPresent() ? $callback($this->wrappedValue) : null;
    }

    public function orElse($other)
    {
        return $this->isPresent() ? $this->wrappedValue : $other;
    }
}