<?php
namespace PHRamda\Functors;

use PHRamda\Functors\Either;
use PHRamda\Functors\Interfaces\Applicative;
use PHRamda\Functors\Interfaces\Functor;
use PHRamda\Functors\Interfaces\EitherInterface;

final class Right extends Either
{
  public static function pure($value): Applicative
  {
    return new Right($value);
  }

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

    public function orElse(EitherInterface $either): EitherInterface
    {
        return $this;
    }

    public function map(callable $callback): Functor
    {
        return self::of($callback($this->value));
    }

    public function flatMap(callable $callback): EitherInterface
    {
        return $callback($this->value);
    }

    public function filter(callable $callback, $error): EitherInterface
    {
        return $callback($this->value) == true ? $this : Left::of($error);
    }

    public static function of($value): EitherInterface
    {
        return new self($value);
    }
}
