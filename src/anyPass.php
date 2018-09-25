<?php
namespace PHRamda;

function anyPass(callback $callback, array $subjects): bool
{
    $cnt = count($subjects);
    $status = false;
    for ($i = 0; $i < $cnt; $i += 1) {
        $status = $status || $callback($subjects[$i]);
    }
    return $status;
}

function anyPass(callback $callback)
{
    return function (array $subjects) use ($callback) {
        return anyPass($callback, $subjects);
    };
}
