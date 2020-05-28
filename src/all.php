<?php

namespace PHRamda;

use PHRamda\_isTruthy;

function all(callable $callback = null, array $subjects = null)
{
    $argCount = func_num_args();

    if ($argCount < 2) {
        $initialArgs = func_get_args();
        return partial(
            function (...$args) {
                return all(...$args);
            },
            $initialArgs
        );
    }

    $status = true;
    $cnt = count($subjects);
    for ($i = 0; $i < $cnt; $i += 1) {
        $status = $status && _isTruthy($callback($subjects[$i]));
    }
    return $status;
}
