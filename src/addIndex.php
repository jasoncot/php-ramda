<?php

namespace PHRamda;

use Closure;

/**
 * @param callable $iteratorFn
 * @param callable $transformFn
 * @param array    $array
 * @return Closure
 */
function addIndex(callable $iteratorFn = null, callable $transformFn = null, array $array = null)
{
    $argCount = func_num_args();

    if ($argCount < 3) {
        $initialArgs = func_get_args();
        return partial(
            function (...$args) {
                return addIndex(...$args);
            },
            $initialArgs
        );
    }

    $index = 0;
    return $iteratorFn(
        function ($input) use ($index, $transformFn) {
            return $transformFn($input, $index++);
        },
        $array
    );
}
