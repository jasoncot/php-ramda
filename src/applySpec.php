<?php
namespace PHRamda;

use function PHRamda\keys;
use function PHRamda\pipe;
use function PHRamda\fromPairs;
use function PHRamda\prop;
use function PHRamda\toPairs;
use function PHRamda\c_map;

/**
 * Takes an object or assoc that contains callables that we want to transform, all based on a single input.
 * @param  array|object $targetSpec key-value-pair definition with callables as the value
 * @param  mixed        $subject    The value to pass to the callables
 * @return object                   funnel to an object to ensure consistency and reduce overhead
 */
function applySpec($targetSpec, $subject): object
{
    return pipe(
        '\\PHRamda\\toPairs',
        c_map(
            function ($pair) use ($subject)
            {
                return [$pair[0], $pair[1]($subject)];
            }
        ),
        '\\PHRamda\\fromPairs'
    )($targetSpec);
}
