<?php
namespace PHRamda;

use function PHRamda\map;
use function PHRamda\flatten;

function chain(callable $callback, array $list)
{
    return flatten(map($callback, $list));
}
