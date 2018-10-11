<?php
namespace PHRamda\Monoids;
use PHRamda\Monoids\Monoid;

class Any extends Monoid
{
  public static function id()
  {
    return false;
  }

  public static function op($a, $b)
  {
    return $a || $b;
  }
}
