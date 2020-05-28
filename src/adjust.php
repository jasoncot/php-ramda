<?php
namespace PHRamda;

use function PHRamda\assocPath;

/**
 * Apply a transform function at index of the array provided
 * 
 * @param int      $index    The position of the array to operate on
 * @param callable $callback Transformation function to run
 * @param array    $subject  Source array to operate on
 * @return array|Closure
 */
function adjust(int $index = null, callable $callback = null, array $subject = null)
{
    $argCount = func_num_args();

    if ($argCount < 3) {
        $initialArgs = func_get_args();
        return partial(
            function (...$args) {
                return adjust(...$args);
            },
            $initialArgs
        );
    }

    return assocPath([$index], $callback($subject[$index]), $subject);
}
