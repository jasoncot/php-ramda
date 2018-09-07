<?php
namespace Trailoff\PHRamda;

function reduceLeft($callback, $val, $arr)
{
    if (!isset($callback) || !isset($val) || !isset($arr)) {
        return null;
    }
    $count = count($arr);
    $acc = $val;
    if ($count > 0) {
        while ($count--) {
            $acc = $callback($acc, $arr[$count]);
        }
    }
    return $acc;
}
