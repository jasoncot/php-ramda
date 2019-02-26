<?php

namespace PHRamda;

function concatStrings(string $arg1, string $arg2): string
{
    return $arg1 ?? '' . $arg2 ?? '';
}

function concatArrays(array $arg1, array $arg2): array
{
    return array_merge($arg1 ?? [], $arg2 ?? []);
}

function concat($arg1): \Closure
{
    return function ($arg2) use ($arg1)
    {
        if ('string' === gettype($arg1)) {
            return concatStrings($arg1, $arg2);
        }
        if ('array' === gettype($arg1)) {
            return concatArrays($arg1, $arg2);
        }

        throw new \Error('Argument types must match, got ' . gettype($arg1) . ' and ' . gettype($arg2));
    }
}
