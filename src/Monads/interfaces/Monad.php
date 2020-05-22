<?php

namespace PHRamda\Monads\interfaces;

use PHRamda\Functors\Interfaces\Applicative;

interface Monad extends Applicative
{
  public static function of($value): Monad;
  public static function return($value): Monad;

  public function bind(callable $f): Monad;
}
