<?php
namespace PHRamda;

use function PHRamda\_isTruthy;

function _or($arg0, $arg1)
{
    return _isTruthy($arg0) ? $arg0 : $arg1;
}

function c_or($arg0)
{
    return function ($arg1) use ($arg0) {
        return _or($arg0, $arg1);
    };
}
