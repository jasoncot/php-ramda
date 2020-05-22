<?php
namespace PHRamda\Functors;

use PHRamda\Functors\Either;
use PHRamda\Functors\Interfaces\Applicative;
use PHRamda\Functors\Interfaces\Functor;
use PHRamda\Functors\Interfaces\Either as EitherInterface;
use PHRamda\Monads\interfaces\Monad as MonadInterface;

final class Left extends Either implements MonadInterface
{
    public static function pure($value): Applicative
    {
      return new Left($value);
    }

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

    public function orElse(EitherInterface $either): EitherInterface
    {
        return $either;
    }

    public function map(callable $callback): Functor
    {
        return $this;
    }

    public function flatMap(callable $callback): EitherInterface
    {
        return $this;
    }

    public function filter(callable $callback, $error): EitherInterface
    {
        return $this;
    }

    public static function of($value): MonadInterface
    {
        return new Left($value);
    }
}
