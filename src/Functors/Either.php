<?php
namespace Trailoff\PHRamda\Functors;

abstract class Either
{
    protected $value;
    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function right($value): Right
    {
        return new Right($value);
    }

    public static function left($value): Left
    {
        return new Left($value);
    }

    public static function fromValue($left, $right, $nullValue = null): Either
    {
        return $right === null ?
            self::left($left) :
            self::right($right);
    }

    abstract public function isLeft(): bool;
    abstract public function isRight(): bool;
    abstract public function getLeft($default);
    abstract public function getRight($default);
    abstract public function getOrElse($default);
    abstract public function orElse(Either $either): Either;
    abstract public function map(callable $callback): Either;
    abstract public function flatMap(callable $callback): Either;
    abstract public function filter(callable $callback, $error): Either;
}

final class Left extends Either
{
    public function isLeft(): bool
    {
        return true;
    }

    public function isRight(): bool
    {
        return false;
    }

    public function getLeft($default) {
        return $this->value;
    }

    public function getRight($default) {
        return $default;
    }

    public function getOrElse($default) {
        return $default;
    }

    public function orElse(Either $either): Either {
        return $either;
    }

    public function map(callable $callback): Either {
        return $this;
    }

    public function flatMap(callable $callback): Either {
        return $this;
    }

    public function filter(callable $callback, $error): Either {
        return $this;
    }

    public static function of($value): Either
    {
        return new self($value);
    }
}

final class Right extends Either
{
    public function isLeft(): bool
    {
        return false;
    }

    public function isRight(): bool
    {
        return true;
    }

    public function getLeft($default) {
        return $default;
    }

    public function getRight($default) {
        return $this->value;
    }

    public function getOrElse($default) {
        return $this->value;
    }

    public function orElse(Either $either): Either {
        return $this;
    }

    public function map(callable $callback): Either {
        return self::of($callback($this->value));
    }

    public function flatMap(callable $callback): Either {
        return $callback($this->value);
    }

    public function filter(callable $callback, $error): Either {
        return $callback($this->Value) ? $this : Left::of($error);
    }

    public static function of($value): Either
    {
        return new self($value);
    }
}
