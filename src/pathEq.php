<?php
namespace Trailoff\PHRamda;

use \Trailoff\PHRamda\path;

function pathEq(array $idx, $cmpValue, $subject)
{
    $result = path($idx, $subject);
    return $result === $cmpValue;
}

function c_pathEq(array $idx)
{
    return function ($cmpValue) use ($idx) {
        return function ($subject) use ($cmpValue, $idx) {
            return pathEq($idx, $cmpValue, $subject);
        };
    };
}
