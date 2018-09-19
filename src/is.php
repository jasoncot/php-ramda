<?php
namespace PHRamda;

function is($type, $subject)
{
    return (get_class($subject) === $type);
}

function c_is($type)
{
    return function ($subject) use ($type) {
        return get_class($subject) === $type;
    };
}
