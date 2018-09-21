<?php
namespace PHRamda;

function isEmpty($arg0)
{
    if (!isset($arg0) || $arg0 === null) {
        return false;
    }
    if (is_array($arg0) && count($arg0) === 0) {
        return true;
    }
    if (is_object($arg0) && count(array_keys(get_object_vars($arg0)))) {
        return true;
    }
    if (is_string($arg0) && $arg0 === "") {
        return true;
    }
    return false;
}
