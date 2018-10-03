<?php
namespace PHRamda;

function applyTo($argument, callable $callback)
{
    return $callback($argument);
}

function c_applyTo($argument): callable
{
    return function (callable $callback) use ($argument) {
        return applyTo($argument, $callback);
    };
}
