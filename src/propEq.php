<?php
namespace Trailoff\PHRamda;

use \Trailoff\PHRamda\prop;

function propEq(string $key, $cmpValue, $subject)
{
    $result = prop($key, $subject);
    return $result === $cmpValue;
}

function c_propEq(strin $key)
{
    return function ($cmpValue) use ($key) {
        return function ($subject) use ($key, $cmpValue) {
            return propEq($key, $cmpValue, $subject);
        };
    };
}
