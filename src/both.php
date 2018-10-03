<?php
namespace PHRamda;

function both(callable $callback0, callable $callback1): callable
{
    return function (...$args) use ($callback0, $callback1) {
        $result0 = $callback0(...$args);
        $result1 = $callback1(...$args);
        return $result0 && $result1;
    };
}

function c_both(callable $callback0): callable
{
    return function (callable $callback1) use ($callback0) {
        return both($callback0, $callback1);
    };
}
