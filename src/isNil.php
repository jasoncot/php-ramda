<?php
namespace PHRamda;

function isNil($a): bool
{
    return !isset($a) || is_null($a);
}
