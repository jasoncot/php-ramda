<?php

namespace PHRamda;

use function PHRamda\partial;

function curryN($parameterCount, $callback)
{
    return function (...$args) use ($callback, $parameterCount) {
        $remaining = $parameterCount - count($args);
        if ($remaining > 0) {
            return curryN($remaining, partial($callback, $args));
        }

        return $callback(...$args);
    };
}
