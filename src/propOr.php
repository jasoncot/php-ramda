<?php
namespace PHRamda;

use \PHRamda\prop;
use \PHRamda\isNil;

function propOr($default, string $key, $subject)
{
    $result = prop($key, $subject);
    return isNil($result) ? $default : $result;
}

function c_propOr($default)
{
    return function (string $key) use ($default) {
        return function ($subject) use ($default, $key) {
            return propOr($default, $key, $subject);
        };
    };
}
