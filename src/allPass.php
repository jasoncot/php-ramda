<?php

namespace PHRamda;

use function PHRamda\{_isTruthy, partial};

function allPass(array $callbacks = null, $src = null)
{
    $argCount = func_num_args();

    if ($argCount < 2) {
        $initialArgs = func_get_args();
        return partial(
            function (...$args) {
                return allPass(...$args);
            },
            $initialArgs
        );
    }

    $status = true;
    $cnt = count($callbacks);
    for ($i = 0; $i < $cnt; $i += 1) {
        $status = $status && _isTruthy($callbacks[$i]($src));
    }

    return $status;
}
