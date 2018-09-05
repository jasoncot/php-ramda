<?php
namespace Trailoff\PHRamda;

function reduce($fn, $val, $arr) {
    if (!isset($fn) || !isset($val) || !isset($arr)) {
        return null;
    }
    $count = count($arr);
    $acc = $val;
    for ($i = 0; $i < $count; $i += 1) {
        $acc = $fn($acc, $arr[$i]);
    }
    return $acc;
}
