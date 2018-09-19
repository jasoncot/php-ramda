<?php
namespace PHRamda;

use function PHRamda\keys;
use function PHRamda\prop;
use function PHRamda\map;

function toPairs($subject): array
{
    return map(
        function ($key) use ($subject) {
            return [$key, prop($key, $subject)];
        },
        keys($subject)
    );
}
