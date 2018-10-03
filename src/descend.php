<?php
namespace PHRamda;

function descend(callable $callback, $arg0, $arg1)
{
    $fArg0 = $callback($arg0);
    $fArg1 = $callback($arg1);
    if ($fArg0 < $fArg1) {
        return 1;
    }
    if ($fArg0 > $fArg1) {
        return -1;
    }
    return 0;
}

function c_descend(callable $callback): callable
{
    return function ($arg0) use ($callback) {
        return function ($arg1) use ($callback, $arg0) {
            return descend($callback, $arg0, $arg1);
        };
    };
}
