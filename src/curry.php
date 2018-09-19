<?php
namespace PHRamda;

function curry($parameterCount, $callback, $initialArguments = [])
{
    $arguments = $initialArguments;
    return function ($arg) use ($arguments, $callback, $parameterCount) {
        array_push($arguments, $arg);
        if (count($arguments) >= $parameterCount) {
            return $callback(...$arguments);
        }
        return curry($parameterCount, $callback, $arguments);
    };
}
