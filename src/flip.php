<?php
namespace Trailoff\PHRamda;

/**
 * [flip description]
 * Usage:
 *   normal function usage:  strpos([1, 2, 3, 4, 5], 1);
 *   flipped function usage: flip('strpos')(1, [1, 2, 3, 4, 5]);
 *
 * @param  mixed $a [description]
 * @param  mixed $b [description]
 * @return callable A callback which to apply the parameters, but reversed.
 */
function flip($fn)
{
    return function (...$args) use ($fn) {
        $a = array_shift($args);
        $b = array_shift($args);

        array_unshift($args, $a);
        array_unshift($args, $b);

        return $fn(...$args);
    };
}
