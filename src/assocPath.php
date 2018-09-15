<?php

namespace Trailoff\PHRamda;

use function \Trailoff\PHRamda\prop;
use function \Trailoff\PHRamda\reduce;
use function \Trailoff\PHRamda\assoc;
use function \Trailoff\PHRamda\head;

/**
 * set the value provided on the subject down the provided path
 * // TODO: fill in the optics portion of this code to work with things other than strings
 * @param  array $idx               array of strings, representing lenses or paths to follow on the object
 * @param  mixed $value             The value to set at the end of the optic
 * @param  array|\stdClass $subject the subject of the work
 * @return array|\stdClass          a modified subject with the value set at the path provided
 */
function assocPath(array $idx, $value, $subject)
{
    $stack = reduce(
        function ($_stack, $path) {
            list($property, $src) = head($_stack);
            array_unshift(
                $_stack,
                [
                    $path,
                    $property === null ?
                        $src :
                        propOr(new \stdClass(), $property, $src)
                ]
            );
            return $_stack;
        },
        [[null, $subject]],
        $idx
    );
    return reduce(
        function ($nValue, $pair) {
            list($destKey, $src) = $pair;
            if ($destKey === null) {
                return $nValue;
            }
            return assoc($destKey, $nValue, $src);
        },
        $value,
        $stack
    );
}
