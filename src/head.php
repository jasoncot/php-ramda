<?php
namespace PHRamda;

function head($arg0)
{
    if (!empty($arg0)) {
        if (is_array($arg0)) {
            return $arg0[0];
        }
        if (is_string($arg0)) {
            return substr($arg0, 0, 1);
        }
    }
    return null;
}
