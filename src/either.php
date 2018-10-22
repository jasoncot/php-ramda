<?php
namespace PHRamda;

use PHRamda\Functors\Left;
use PHRamda\Functors\Right;

function either($left, $right, $nullValue = null)
{
  return $right === $nullValue ?
    Left::of($left) :
    Right::of($right);
}
