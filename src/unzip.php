<?php
namespace PHRamda;

use function PHRamda\reduce;

function unzip(array $source)
{
    $ret = [];
    return reduce(
        function (array $acc, array $pair) {
            $acc[0][] = $pair[0];
            $acc[1][] = $pair[1];
            return $acc;
        },
        [],
        $source
    );
}
