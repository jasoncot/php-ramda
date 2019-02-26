<?php

namespace PHRamda;

/**
 * @param \Closure $fn
 * @return \Closure
 */
function comparitor(\Closure $fn): \Closure
{
    /**
     * @param mixed $a
     * @param mixed $b
     * @return int
     */
    return function ($a, $b) use ($fn):int
    {
        return $fn($a, $b) ? -1 : 1;
    };
}
