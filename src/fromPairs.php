<?php
namespace PHRamda;

use PHRamda\assoc;
use PHRamda\reduce;

function fromPairs(array $pairs)
{
    return reduce(
        function ($acc, $pair) {
            list($key, $value) = $pair;
            return assoc($key, $value, $acc);
        },
        new \stdClass(),
        $pairs
    );
}
