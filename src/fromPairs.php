<?php
namespace Trailoff\PHRamda;

function fromPairs(array $pairs)
{
    $obj = new \stdClass();
    $cnt = count($pairs);
    for ($i = 0; $i < $cnt; $i += 1) {
        list($key, $value) = $pairs[$i];
        $obj->{$key} = $value;
    }
    return $obj;
}
