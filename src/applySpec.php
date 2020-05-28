<?php
namespace PHRamda;

/**
 * Takes an object or assoc that contains callables that we want to transform, all based on a single input.
 * 
 * @param  object $targetSpec key-value-pair definition with callables as the value
 * @param  mixed  $subject    The value to pass to the callables
 * @return object             funnel to an object to ensure consistency and reduce overhead
 */
function applySpec(object $targetSpec = null, $subject = null): object
{
    $argCount = func_num_args();

    if ($argCount < 2) {
        $initialArgs = func_get_args();
        return partial(
            function (...$args) {
                return applySpec(...$args);
            },
            $initialArgs
        );
    }

    $result = (object) [];
    foreach ($targetSpec as $key => $mapFn) {
        if (is_callable($mapFn)) {
            $result->{$key} = $mapFn($subject);
        } elseif (is_object($mapFn)) {
            $result->{$key} = applySpec($mapFn, $subject);
        }
    }
    return $result;
}
