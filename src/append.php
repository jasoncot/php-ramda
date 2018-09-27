<?php
namespace PHRamda;

function append($addition, array $subject): array
{
    return array_merge($subject, [$addition]);
}

function c_append($addition): Closure
{
    return function (array $subject) use ($addition): array
    {
        return append($addition, $subject);
    };
}
