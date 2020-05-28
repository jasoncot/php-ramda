<?php

namespace PHRamda;

use function PHRamda\partial;

/**
 * @param number $arg0
 * @param number $arg1
 * @return number
 */
function multiply($arg0 = null, $arg1 = null)
{
    $argCount = func_num_args();

    if ($argCount < 2) {
        $initialArgs = func_get_args();
        return partial(
            function (...$args) {
                return multiply(...$args);
            },
            $initialArgs
        );
    }

    return $arg0 * $arg1;
}
