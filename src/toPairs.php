<?php
namespace Trailoff\PHRamda;

use function Trailoff\PHRamda\keys;
use function Trailoff\PHRamda\prop;
use function Trailoff\PHRamda\map;

function toPairs($subject): array
{
    return map(
        function ($key) use ($subject) {
            return [$key, prop($key, $subject)];
        },
        keys($subject)
    );
}
