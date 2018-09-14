<?php
namespace Trailoff\PHRamda;

use Trailoff\PHRamda\keys;
use Trailoff\PHRamda\prop;

function reduce($callback, $val, $arr)
{
    if (!isset($callback) || !isset($val) || !isset($arr)) {
        return null;
    }
    $keys = keys($arr);
    $count = count($keys);
    $acc = $val;
    for ($i = 0; $i < $count; $i += 1) {
        $key = $keys[$i];
        $acc = $callback($acc, prop($key, $arr), $key);
    }
    return $acc;
}

function c_reduce($callback)
{
    return function ($initialValue) use ($callback) {
        return function ($reducable) use ($callback, $initialValue) {
            return reduce($callback, $initialValue, $reducable);
        };
    };
}
