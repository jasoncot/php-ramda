<?php
namespace PHRamda;

/**
 * determine if the given value is truthy
 * @param  mixed $a the subject to be testing
 * @return boolean    the result of determining the thing is truthy
 */
function _isTruthy($a = null)
{
    $argCount = func_num_args();

    if ($argCount < 1) {
        $initialArgs = func_get_args();
        return partial(
            function (...$args) {
                return _isTruthy(...$args);
            },
            $initialArgs
        );
    }

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
