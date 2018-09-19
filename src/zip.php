<?php
namespace Trailoff\PHRamda;

use function Trailoff\PHRamda\reduce;
use function Trailoff\PHRamda\min;
use function Trailoff\PHRamda\pipe;
use function Trailoff\PHRamda\map;

function zip(...$args): array
{
    $smallest = pipe(
        map('count'),
        reduce(['Trailoff\PHRamda', 'min'])
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
