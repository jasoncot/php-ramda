<?php
namespace Trailoff\PHRamda;

function reduce($callback, $val, $arr)
{
    if (!isset($callback) || !isset($val) || !isset($arr)) {
        return null;
    }
    $count = count($arr);
    $acc = $val;
    for ($i = 0; $i < $count; $i += 1) {
        $acc = $callback($acc, $arr[$i]);
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
