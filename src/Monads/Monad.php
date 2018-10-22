<?php
namespace PHRamda\Monads;
use PHRamda\Functors\Interfaces\Applicative;

abstract class Monad extends Applicative
{
  public static function return($value): Monad
  {
    return static::pure($value);
  }

  abstract public function bind(callable $f): Monad;

  public static function of($value): Monad
  {
    return static::pure($value);
  }
}
