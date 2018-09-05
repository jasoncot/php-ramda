<?php
namespace Trailoff\PHRamda;

function map($fn, $arr) {
    if (!isset($arr) || !isset($fn)) {
        if (!is_array($arr)) {
            return [];
        }
        return $arr;
    }
    $count = count($arr);
    $results = [];
    for ($i = 0; $i < $count; $i += 1) {
        $results[] = $fn($arr[$i]);
    }
    return $results;
}
