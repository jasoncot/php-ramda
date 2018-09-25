<?php
namespace PHRamda;

use function PHRamda\assocPath;

function adjust(callable $callback, int $index, array $subject): array
{
    return assocPath([$index], $callback($subject[$index]), $subject);
}

function c_adjust(callable $callback)
{
    return function (int $index) use ($callback) {
        return function (array $subject) use ($callback, $index) {
            return adjust($callback, $index, $subject);
        };
    };
}
