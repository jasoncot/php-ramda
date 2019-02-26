<?php

namespace PHRamda;

/**
 * @param \Closure $fn
 * @return \Closure
 */
function addIndex(\Closure $fn): \Closure
{
    /**
     * @param \Closure $innerFn
     * @return \Closure
     */
    return function (\Closure $innerFn) use ($fn): \Closure
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
