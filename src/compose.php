<?php
namespace PHRamda;

use function \PHRamda\reduceLeft;

function compose(...$callbacks)
{
    return function ($arg) use ($callbacks) {
        return reduceLeft(
            function ($acc, $callback) {
                return $callback($acc);
            },
            $arg,
            $callbacks
        );
    };
}
