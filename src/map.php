<?php
namespace PHRamda;

function map(callable $callback = null, $mappable = null)
{
    $argCount = func_num_args();

    if ($argCount < 2) {
        $initialArgs = func_get_args();
        return partial(
            function (...$args) {
                return map(...$args);
            },
            $initialArgs
        );
    }


    if (empty($mappable)) {
        return  [];
    }

    if (method_exists($mappable, "map")) {
        return $mappable->map($callback);
    }

    $count = count($mappable);
    $results = [];
    for ($i = 0; $i < $count; $i += 1) {
        $results[] = $callback($mappable[$i]);
    }
    return $results;
}
