<?php

namespace PHRamda\Monads;

use PHRamda\Monads\interfaces\Monad as MonadInterface;

abstract class Monad implements MonadInterface
{
  public static function return($value): MonadInterface
  {
    return static::pure($value);
  }

  abstract public function bind(callable $f): MonadInterface;

  public static function of($value): MonadInterface
  {
    return static::pure($value);
  }
}
