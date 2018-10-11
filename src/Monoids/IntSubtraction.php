<?php
namespace PHRamda\Monoids;
use PHRamda\Monoids\Monoid;

class IntSubtraction extends Monoid
{
  public static function id()
  {
    return 0;
  }

  public static function op($a, $b)
  {
    return $a - $b;
  }
}
