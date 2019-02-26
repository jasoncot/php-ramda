<?php
namespace PHRamda;

/**
 * @param \Closure $callback
 * @param mixed ...$args0
 * @return mixed
 */
function call(\Closure $callback, ...$args)
{
    return $callback(...$args);
}
