<?php
namespace PHRamda;

function lt($arg0, $arg1)
{
    return $arg0 < $arg1;
}

function gt($arg0, $arg1)
{
    return $arg0 > $arg1;
}

function min($arg0, $arg1)
{
    return lt($arg0, $arg1) ? $arg0 : $arg1;
}

function max($arg0, $arg1)
{
    return gt($arg0, $arg1) ? $arg0 : $arg1;
}
