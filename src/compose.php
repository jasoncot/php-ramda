<?php
namespace Trailoff\PHRamda;

function compose(callable $fn0, callable $fn1)
{
    if (!is_callable($fn0) || !is_callable($fn1)) {
        throw new Exception("One of the arguments called was not callable");
    }
    return function ($arg) use ($fn0, $fn1) {
        return $fn0($fn1($arg));
    };
}
