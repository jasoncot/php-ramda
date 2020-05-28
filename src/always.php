<?php

namespace PHRamda;

use Closure;

/**
 * Returns a Closure that always return the provided value
 * 
 * @param mixed $arg0 The source value to be returned
 * @return Closure 
 */
function always($arg0): Closure
{
    return function () use ($arg0) {
        return $arg0;
    };
}
