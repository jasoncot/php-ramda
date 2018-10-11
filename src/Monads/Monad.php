<?php
namespace PHRamda\Monads;
use PHRamda\Functors\Interfaces\Applicative;

abstract class Monad extends Applicative
{
  public static function return($value): Monad
  {
    return static::pure($value);
  }

  public abstract function bind(callable $f): Monad;
}
