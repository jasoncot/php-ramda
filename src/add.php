<?php
namespace PHRamda;

/**
 * @param number $arg0
 * @param number $arg1
 * @return number
 */
function add($arg0 = null, $arg1 = null)
{
    $argCount = func_num_args();

    if ($argCount < 2) {
        $initialArgs = func_get_args();
        return partial(
            function (...$args) {
                return add(...$args);
            },
            $initialArgs
        );
    }

    return $arg0 + $arg1;
}
