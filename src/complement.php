<?php

namespace PHRamda;

function complement(\Closure $fn): \Closure
{
    return function (...$args) use ($fn){
        return $fn(...$args) == true ? false : true;
    };
}
