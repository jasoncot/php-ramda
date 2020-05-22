<?php

namespace PHRamda;

use Closure;

function concatStrings(string $arg1, string $arg2): string
{
    return $arg1 ?? '' . $arg2 ?? '';
}

function concatArrays(array $arg1, array $arg2): array
{
    return array_merge($arg1 ?? [], $arg2 ?? []);
}

/**
 * @param array|string $arg1
 * @param array|string $arg2
 * @return array|string
 */
function concat($arg1, $arg2)
{
    if ('string' === gettype($arg1)) {
        return concatStrings($arg1, $arg2);
    }
    if ('array' === gettype($arg1)) {
        return concatArrays($arg1, $arg2);
    }

    return [$arg1, $arg2];
}
