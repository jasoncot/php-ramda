<?php
namespace PHRamda\Monoids;
use PHRamda\Monoids\Monoid;

class All extends Monoid
{
  public static function id()
  {
    return true;
  }

  public static function op($a, $b)
  {
    return $a && $b;
  }
}
