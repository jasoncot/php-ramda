<?php

namespace PHRamda;

function apply($callback, ...$args)
{
    return function (...$additionalArgs) use ($callback, $args) {
        $combined = array_merge($args, $additionalArgs);
        return $callback(...$combined);
    };
}
