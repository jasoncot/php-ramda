<?php
namespace PHRamda;

use PHRamda\_isTruthy;

function all(callable $callback, array $subjects): bool
{
    $status = true;
    $cnt = count($subjects);
    for ($i = 0; $i < $cnt; $i += 1) {
        $status = $status && _isTruthy($callback($subjects));
    }
    return $status;
}

function c_all(callable $callback)
{
    return function (array $subjects) use ($callback) {
        return all($callback, $subjects);
    };
}
