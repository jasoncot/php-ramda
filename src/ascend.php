<?php
namespace PHRamda;

function ascend(callable $callback, $arg0, $arg1)
{
    $fArg0 = $callback($arg0);
    $fArg1 = $callback($arg1);
    if ($fArg0 > $fArg1) {
        return 1;
    }
    if ($fArg0 < $fArg1) {
        return -1;
    }
    return 0;
}

function c_ascend(callable $callback): callable
{
    return function ($arg0) use ($callback) {
        return function ($arg1) use ($callback, $arg0) {
            return ascend($callback, $arg0, $arg1);
        };
    };
}
