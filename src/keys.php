<?php
namespace Trailoff\PHRamda;

function keys($subject)
{
    if (!empty($subject)) {
        if (is_array($subject)) {
            return array_keys($subject);
        }
        if (is_object($subject)) {
            return array_keys(\get_object_vars($subject));
        }
    }
    return [];
}
