<?php
namespace PHRamda\Functors;
use PHRamda\Monads\Monad;
use PHRamda\Functors\Interfaces\Applicative;
use PHRamda\Functors\Interfaces\Functor;

abstract class Either extends Monad
{
    protected $value;
    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function pure($value): Applicative
    {
      return ($value === null) ?
        static::left($value) :
        static::right($value);
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

    public function get()
    {
      return $this->value;
    }

    /**
     * I'm not sure if this is implemented in the correct method. should it return pure?
     * @param  callable $callback function to call with the current $this->value
     * @return Monad              a Monad compatable return object
     */
    public function bind(callable $callback): Monad
    {
      return static::pure($callback($this->get()));
    }

    public function apply(Applicative $f): Applicative
    {
      return static::pure($f->get()($this->get()));
    }

    abstract public function isLeft(): bool;
    abstract public function isRight(): bool;
    abstract public function getLeft($default);
    abstract public function getRight($default);
    abstract public function getOrElse($default);
    abstract public function orElse(Either $either): Either;

    // abstract public function map(callable $callback): Functor;

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

    public function getLeft($default)
    {
        return $this->value;
    }

    public function getRight($default)
    {
        return $default;
    }

    public function getOrElse($default)
    {
        return $default;
    }

    public function orElse(Either $either): Either
    {
        return $either;
    }

    public function map(callable $callback): Functor
    {
        return $this;
    }

    public function flatMap(callable $callback): Either
    {
        return $this;
    }

    public function filter(callable $callback, $error): Either
    {
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

    public function getLeft($default)
    {
        return $default;
    }

    public function getRight($default)
    {
        return $this->value;
    }

    public function getOrElse($default)
    {
        return $this->value;
    }

    public function orElse(Either $either): Either
    {
        return $this;
    }

    public function map(callable $callback): Functor
    {
        return self::of($callback($this->value));
    }

    public function flatMap(callable $callback): Either
    {
        return $callback($this->value);
    }

    public function filter(callable $callback, $error): Either
    {
        return $callback($this->Value) ? $this : Left::of($error);
    }

    public static function of($value): Either
    {
        return new self($value);
    }
}
