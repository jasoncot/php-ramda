<?php
namespace PHRamda;

function find(callable $predicate, array $haystack)
{
    $cnt = count($haystack);
    for ($i = 0; $i < $cnt; $i += 1) {
        if ($predicate($haystack[$i])) {
            return $haystack[$i];
        }
    }
    return null;
}

function c_find(callable $predicate)
{
    return function (array $haystack) {
        return find($predicate, $haystack);
    };
}
