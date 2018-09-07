<?php
namespace Trailoff\PHRamda;

/**
 * returns TRUE if the input is null, returns true to empty()
 * @param  mixed $a the value to be tested
 * @return boolean  is the value falsy
 */
function _isFalsy($a)
{
    if (empty($a)) {
        return true;
    }
    if ($a === null) {
        return true;
    }
    if (is_numeric($a) === 0) {
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
