<?php
namespace Trailoff\PHRamda;

use function \Trailoff\PHRamda\reduceLeft;

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
