<?php
namespace PHRamda;

use function PHRamda\_isFalsy;

function unless(callable $predicate, callable $callback, $subject)
{
    return _isFalsy($predicate($subject)) ? $callaback($subject) : $subject;
}

function c_unless(callable $predicate)
{
    return function (callable $callback) use ($predicate) {
        return function ($subject) use ($callback, $predicate) {
            return unless($predicate, $callback, $subject);
        };
    };
}
