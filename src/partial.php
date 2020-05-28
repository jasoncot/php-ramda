<?php

namespace PHRamda;

use Closure;

function partial(callable $fn, array $partiallyAppliedArgs): Closure
{
    return function (...$args) use ($fn, $partiallyAppliedArgs) {
        $joined = array_merge($partiallyAppliedArgs, $args);
        return $fn(...$joined);
    };
}
