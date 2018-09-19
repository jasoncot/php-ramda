<?php
namespace Trailoff\PHRamda\Functors;

abstract class Maybe {
    public static function just($value): Just
    {
        return Just::of($value);
    }

    public static function nothing(): Nothing
    {
        return Nothing::of();
    }

    public static function fromValue($value, $nullValue = null)
    {
        return $value === $nullValue ?
            Nothing::of() :
            Just::of($value);
    }

    abstract public function isJust(): bool;
    abstract public function isNothing(): bool;
    abstract public function getOrElse($default);
    abstract public function map(callable $callback): Maybe;
    abstract public function orElse(Maybe $maybe): Maybe;
    abstract public function flatMap(callable $callback): Maybe;
    abstract public function filter(callable $callback): Maybe;
}

final class Just extends Maybe {
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function isJust(): bool
    {
        return true;
    }

    public function isNothing(): bool
    {
        return false;
    }

    public function getOrElse($default)
    {
        return $this->value;
    }

    public function map(callable $callback): Maybe
    {
        return Just::of($callback($this->value));
    }

    public function orElse(Maybe $maybe): Maybe
    {
        return $this;
    }

    public function flatMap(callable $callback): Maybe
    {
        return $callback($this->value);
    }

    public function filter(callable $callback): Maybe
    {
        return $f($this->value) ? $this : Maybe::nothing();
    }

    public static function of($value): Just
    {
        return new Just($value);
    }
}

final class Nothing extends Maybe
{
    public function __construct()
    {
    }

    public function isJust(): bool
    {
        return false;
    }

    public function isNothing(): bool
    {
        return true;
    }

    public function getOrElse($default)
    {
        return $default;
    }

    public function map(callable $callback): Maybe
    {
        return $this;
    }

    public function orElse(Maybe $maybe): Maybe
    {
        return $maybe;
    }

    public function flatMap(callable $callback): Maybe
    {
        return $this;
    }

    public function filter(callable $callback): Maybe
    {
        return $this;
    }

    public static function of(): Nothing
    {
        return new Nothing();
    }
}
