<?php
namespace PHRamda;

function values($collection)
{
    if (is_array($collection)) {
        return array_values($collection);
    }
    if (is_object($collection)) {
        return array_values(\get_object_vars($collection));
    }
    return [];
}
