<?php

namespace Trailoff\PHRamda;

use function \Trailoff\PHRamda\prop;
use function \Trailoff\PHRamda\reduce;
use function \Trailoff\PHRamda\assoc;
use function \Trailoff\PHRamda\head;

/**
 * set the value provided on the subject down the provided path
 * @param  array  $idx     [description]
 * @param  [type] $value   [description]
 * @param  [type] $subject [description]
 * @return [type]          [description]
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
