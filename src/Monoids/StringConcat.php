<?php
namespace PHRamda\Monoids;
use PHRamda\Monoids\Monoid;

class StringConcat extends Monoid
{
  public static function id()
  {
    return '';
  }

  public static function op($a, $b)
  {
    return $a.$b;
  }
}
