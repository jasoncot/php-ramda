<?php
namespace PHRamda\Monoids;
use PHRamda\Monoids\Monoid;

class ArrayMerge extends Monoid
{
  public static function id()
  {
    return [];
  }

  public static function op($a, $b)
  {
    return array_merge($a, $b);
  }
}
