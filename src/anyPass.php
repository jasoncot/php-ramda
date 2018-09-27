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

function c_anyPass(callback $callback): Closure
{
    return function (array $subjects) use ($callback): bool
    {
        return anyPass($callback, $subjects);
    };
}
