<?php
namespace PHRamda;

function always($arg0)
{
    return function () use ($arg0) {
        return $arg0;
    };
}
