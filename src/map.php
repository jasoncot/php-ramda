<?php
namespace PHRamda;

function map($callback, $mappable)
{
    if (empty($mappable)) {
        return  [];
    }

    if (method_exists($mappable, "map")) {
        return $mappable->map($callback);
    }

    $count = count($mappable);
    $results = [];
    for ($i = 0; $i < $count; $i += 1) {
        $results[] = $callback($mappable[$i]);
    }
    return $results;
}

function c_map($callback)
{
    return function ($mappable) use ($callback) {
        return map($callback, $mappable);
    };
}
