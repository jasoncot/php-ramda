<?php
namespace Trailoff\PHRamda;
use Trailoff\PHRamda\isNil;

function defaultTo($a, $b)
{
    return isNil($b) ? $a : $b;
}
