<?php
namespace PHRamda;

function filter(callable $predicate, array $list)
{
    return array_filter($list, $predicate);
}

function c_filter(callable $predicate)
{
    return function (array $list) use ($predicate) {
        return filter($predicate, $list);
    };
}
