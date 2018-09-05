<?php
namespace Trailoff\PHRamda;
use function Trailoff\PHRamda\reduce;

function pipe($fns) {
    return function ($arg0) use ($fns) {
        $reduceFn = function ($acc, $fn) {
            return $fn($acc);
        };
        return reduce($reduceFn, $arg0, $fns);
    };
}
