<?php
namespace Trailoff\PHRamda;

/**
 * determine if the given value is truthy
 * @param  mixed $a the subject to be testing
 * @return boolean    the result of determining the thing is truthy
 */
function _isTruthy($a)
{
    if ($a === null) {
        return false;
    }
    if (empty($a)) {
        return false;
    }
    if (is_array($a) && count($a) === 0) {
        return false;
    }
    if ($a === false) {
        return false;
    }
    if (is_string($a) && $a === "") {
        return false;
    }
    if (is_object($a) && count(array_keys(get_object_vars($a))) === 0) {
        return false;
    }
    return true;
}
