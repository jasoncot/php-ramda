<?php
namespace PHRamda\Monoids;
use PHRamda\Monoids\Monoid;

class IntProduct extends Monoid
{
  public static function id()
  {
    return 1;
  }

  public static function op($a, $b)
  {
    return $a * $b;
  }
}
