<?php
namespace Trailoff\PHRamda;

use Trailoff\PHRamda\isNil;

function defaultTo($arg0, $arg1)
{
    return isNil($arg1) ? $arg0 : $arg1;
}

function c_defaultTo($arg0)
{
    return function ($arg1) use ($arg0) {
        return defaulTo($arg0, $arg1);
    };
}
