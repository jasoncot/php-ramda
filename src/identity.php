<?php
namespace PHRamda;

function identity($arg0 = null)
{
    $argCount = func_num_args();

    if ($argCount < 1) {
        $initialArgs = func_get_args();
        return partial(
            function (...$args) {
                return identity(...$args);
            },
            $initialArgs
        );
    }

    return $arg0;
}
