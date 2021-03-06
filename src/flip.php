<?php
namespace PHRamda;

/**
 * [flip description]
 * Usage:
 *   normal function usage:  strpos([1, 2, 3, 4, 5], 1);
 *   flipped function usage: flip('strpos')(1, [1, 2, 3, 4, 5]);
 *
 * @param  callable $callback
 * @param  mixed $arg0 [description]
 * @param  mixed $arg1 [description]
 * @return mixed A callback which to apply the parameters, but reversed.
 */
function flip(callable $callback, $arg0, $arg1)
{
    return $callback($arg1, $arg0);
}

function c_flip(callable $callback)
{
    return function ($arg0) use ($callback) {
        return function ($arg1) use ($arg0, $callback) {
            return $callback($arg1, $arg0);
        };
    };
}
