<?php
namespace PHRamda;

use function PHRamda\reduce;

function pipe(...$callbacks)
{
    return function ($arg0) use ($callbacks) {
        return reduce(
            function ($acc, callable $callback) {
                return $callback($acc);
            },
            $arg0,
            $callbacks
        );
    };
}
