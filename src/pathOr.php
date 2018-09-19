<?php
namespace PHRamda;

use function \PHRamda\path;

function pathOr($default, array $idx, $subject = null)
{
    $result = path($idx, $subject);
    return $result === null ? $default : $result;
}

function c_pathOr($default)
{
    return function (array $idx) use ($default) {
        return function ($subject) use ($default, $idx) {
            return pathOr($default, $idx, $subject);
        };
    };
}
