<?php
namespace PHRamda;

use function PHRamda\_isTruthy;

function when(callable $predicate, callable $callback, $subject)
{
    return _isTruthy($predicate($subject)) ? $callback($subject) : $subject;
}

function c_when(callable $predicate)
{
    return function (callable $callback) use ($predicate) {
        return function ($subject) use ($callback, $predicate) {
            return when($predicate, $callback, $subject);
        };
    };
}
