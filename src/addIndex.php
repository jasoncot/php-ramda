<?php

namespace PHRamda;

use Closure;

/**
 * @param Closure $fn
 * @return Closure
 */
function addIndex(callable $fn): Closure
{
    /**
     * @param \Closure $innerFn
     * @return \Closure
     */
    return function (callable $innerFn) use ($fn): Closure
    {
        /**
         * @param array $array
         * @return mixed
         */
        return function (array $array) use ($fn, $innerFn)
        {
            $index = 0;
            return $fn(
                function ($input) use ($index, $innerFn) {
                    return $innerFn($input, $index++);
                },
                $array
            );
        };
    };
}
