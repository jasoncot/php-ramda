<?php
namespace Trailoff\PHRamda;

use Trailoff\PHRamda\isNil;

function defaultTo($arg0, $arg1)
{
    return isNil($arg1) ? $arg0 : $arg1;
}
