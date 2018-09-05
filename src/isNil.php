<?php
namespace Trailoff\PHRamda;

function isNil($a): bool
{
    return !isset($a) || is_null($a);
}
