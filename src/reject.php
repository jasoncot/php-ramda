<?php
namespace PHRamda;

use \PHRamda\pipe;

function reject(callable $predicate, array $list)
{
    return array_filter(
        $list,
        pipe(
            $predicate,
            function ($input) {
                return $input === false;
            }
        )
    );
}

function c_reject(callable $predicate)
{
    return function (array $list) use ($predicate) {
        return reject($predicate, $list);
    };
}
