<?php
namespace PHRamda;

function isEmpty($a)
{
    if (!isset($a) || $a === null) {
        return false;
    }
    if (is_array($a) && count($a) === 0) {
        return true;
    }
    if (is_object($a) && count(array_keys(get_object_vars($a)))) {
        return true;
    }
    if (is_string($a) && $a === "") {
        return true;
    }
    return false;
}
