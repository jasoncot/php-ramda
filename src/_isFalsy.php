<?php
namespace Trailoff\PHRamda;

/**
 * [_isFalsy description]
 * @param  mixed $a [description]
 * @return boolean    [description]
 */
function _isFalsy($a)
{
    if ($a === null) {
        return true;
    }
    if (empty($a)) {
        return true;
    }
    if (is_array($a) && count($a) === 0) {
        return true;
    }
    if ($a === false) {
        return true;
    }
    if (is_string($a) && $a === "") {
        return true;
    }
    if (is_object($a) && count(array_keys(get_object_vars($a))) === 0) {
        return true;
    }
    return false;
}
