<?php
namespace PHRamda;

function add($arg0, $arg1)
{
    return $arg0 + $arg1;
}

function c_add($arg0)
{
    return function ($arg1) use ($arg0) {
        return $arg0 + $arg1;
    };
}
