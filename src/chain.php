<?php
namespace PHRamda;

use function PHRamda\map;
use function PHRamda\flatten;

function chain(callable $callback, array $list)
{
    $ret = [];
    foreach ($list as $item) {
        $itr = $callback($item);
        if (is_array($itr)) {
            $ret = concat($ret, $itr);
        } else {
            $ret[] = $itr;
        }
    }
    return $ret;
}
