<?php
namespace PHRamda;

function bind(callable $callback, $context): callable
{
    return function (...$args) use ($callback, $context) {
        return \call_user_func_array([$context, $callback], $args);
    };
}

function c_bind(callable $callback): callable
{
    return function ($context) use ($callback) {
        return bind($callback, $context);
    };
}
