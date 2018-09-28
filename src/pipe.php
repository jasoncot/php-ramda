<?php
namespace PHRamda;

use function PHRamda\reduce;

function pipe(...$callbacks): callable
{
    return function ($arg0) use ($callbacks) {
        return reduce(
            function ($acc, $callback) {
                return call_user_func($callback, $acc);
            },
            $arg0,
            $callbacks
        );
    };
}
