<?php

namespace PHRamda;

/**
 * @param array $callbacks List of things to test
 * @param mixed $subject   Value to test
 * @return boolean|Closure
 */
function anyPass(array $callbacks = null, $subject = null)
{
    $argCount = func_num_args();

    if ($argCount < 2) {
        $initialArgs = func_get_args();
        return partial(
            function (...$args) {
                return anyPass(...$args);
            },
            $initialArgs
        );
    }

    $cnt = count($callbacks);
    $status = false;
    for ($i = 0; $i < $cnt; $i += 1) {
        $status = $status || _isTruthy($callback[$i]($subject));
    }
    return $status;
}
