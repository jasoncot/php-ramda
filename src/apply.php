<?php

namespace PHRamda;

function apply(callable $callback, array $args)
{
    return call_user_func_array($callback, $args);
}

function c_apply(callable $callback): Closure
{
    return function (array $args) use ($callback)
    {
        return call_user_func_array($callback, $args);
    };
}
