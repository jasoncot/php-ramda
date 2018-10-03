<?php
namespace PHRamda;

function call(callable $callback, ...$args0): callable
{
    return function (...$args1) use ($callback, $args0) {
        return call_user_func_array($callback, array_merge($args0, $args1));
    };
}
