<?php
namespace PHRamda;

function binary(callable $callback): callable
{
    return function ($arg0, $arg1) use ($callback) {
        return $callback($arg0, $arg1);
    };
}
