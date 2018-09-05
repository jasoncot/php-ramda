<?php

namespace PHRamda;

include("lib/add.php");
include("lib/subtract.php");
include("lib/reduce.php");
include("lib/pipe.php");
include("lib/map.php");
include("lib/tap.php");

// the whole point of forEvery/forEach would be for side-effects
function forEvery($fn, $list) {
    $c = count($list);
    $responses = [];
    for ($i = 0; $i < $c; $i += 1) {
        $fn($list[$i]);
    }
    return null;
}

// takes two arrays and returns an array, but the first item will be modified (DANGEROUS)
function dangerous_concat($a, $b)
{
    if (!isset($a)) {
        if (!isset($b)) {
            return [];
        }
        return $b;
    }
    if (!isset($b)) {
        return $a;
    }

    forEvery(
        function ($item) use ($a) {
            array_push($a, $item);
        },
        $b
    );

    return $a;
}

// Takes a number of arguments to curry and the function to curry
function curryN($count, $f) {
    $arguments = [];

    return function (...$args) use ($arguments, $count, $f) {

    };
}


function is($t, $a) {
    // returns boolean
    if (strtolower($t) === "array") {
        return is_array($a);
    }
    switch (strtolower($t)) {
        case "array":
            return is_array($a);
        case "number":
            return is_int($a) || is_long($a) || is_float($a) || is_double($a) || is_real($a) || is_finite($a);
        case "int":
            return is_int($a);
        case "long":
            return is_long($a);
        case "string":
            return is_string($a);
        case "function":

        case "callable":
            return is_callable($a);
        default:
            throw new \Exception("Unknown type: '$t'.");
    }

}

function _or($a, $b) {
    if (isset($a) && (!empty($a) || !is_null($a))) {
        return $a;
    }
    return $b;
}

/**
 * takes a default value, returns a function that will return either the value passed or the default.
 * @param $a
 * @return callable
 */
function defaultTo($a) {
    return function ($b) use ($a) {
        return PHRamda::_or($b, $a);
    };
}

function identity($val) {
    return $val;
}

function flip($a, $b) {
    return function ($fn) use ($a, $b) {
        return $fn($b, $a);
    };
}

function isEmpty($a) {
    if (is('Array', $a) || is('String', $a)) {
        return empty($a);
    }
    return false;
}

function isNil($a) {
    if (!isset($a) || is_null($a)) {
        return true;
    }
    return false;
}

function head($arr) {
    if (is("Array", $arr) && !isEmpty($arr)) {
        return $arr[0];
    }
    return $arr;
}

function last($arr) {
    if (is('Array', $arr) && !isEmpty($arr)) {
        return $arr[count($arr) - 1];
    }
    return $arr;
}

function toPairs($object) {
    // how to get the list of keys for a php object ..
    $list = array();
    foreach ($object as $key => $value) {
        $list[] = array($key, $value);
    }
    return $list;
}

function fromPairs($arr) {
    // assumes [[k0, v1], [k1, v1], ...]

}
