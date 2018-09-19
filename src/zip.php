<?php
namespace PHRamda;

use function PHRamda\reduce;
use function PHRamda\min;
use function PHRamda\pipe;
use function PHRamda\map;

function zip(...$args): array
{
    $smallest = pipe(
        map('count'),
        reduce(['PHRamda', 'min'])
    )($args);

    $argCount = count($args);
    $zipped = [];
    for ($i = 0; $i < $smallest; $i += 1) {
        $combined = [];
        for ($j = 0; $j < $argCount; $j += 1) {
            $combined[] = $args[$j][$i];
        }
        $zipped[] = $combined;
    }
    return $zipped;
}
