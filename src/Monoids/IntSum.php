<?php
namespace PHRamda\Monoids;
use PHRamda\Monoids\Monoid;

class IntSum extends Monoid
{
  public static function id()
  {
    return 0;
  }

  public static function op($a, $b)
  {
    return $a + $b;
  }
}
