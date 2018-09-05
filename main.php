<?php
namespace PHRamda;

include("lib/add.php");
include("lib/subtract.php");
include("lib/reduce.php");
include("lib/pipe.php");
include("lib/map.php");
include("lib/tap.php");

class PHRamda
{
    static public function add($a, $b)
    {
        return add($a, $b);
    }

    static public function sub($a, $b)
    {
        return subtract($a, $b);
    }

    static public function reduce($fn, $val, $arr)
    {
        return reduce($fn, $val, $arr);
    }

    static public function pipe($fns)
    {
        return pipe($fns);
    }

    static public function tap($fn) {
        return tap($fn);
    }

    static public function map($fn, $arr) {
        return map($fn, $arr);
    }

    static public function path($idx, $subject) {
        // uses an optic to get in a value out of the subject
        // returns mixed
    }

    static public function prop($string, $subject) {
        // returns the value at the prop (single level path) of the subject
    }

    static public function is($t, $a) {
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

    static public function _or($a, $b) {
        return !!$a ? $a : $b;
    }

    /**
     * takes a default value, returns a function that will return either the value passed or the default.
     * @param $a
     * @return callable
     */
    static public function defaultTo($a) {
        return function ($b) use ($a) {
            return PHRamda::_or($b, $a);
        };
    }

    static public function identity($val) {
        return $val;
    }

    static public function flip($a, $b) {
        return function ($fn) use ($a, $b) {
            return $fn($b, $a);
        };
    }

    static public function isEmpty($a) {
        if (PHRamda::is('Array', $a) || PHRamda::is('String', $a)) {
            return empty($a);
        }
        return false;
    }

    static public function isNil($a) {
        if (!isset($a) || is_null($a)) {
            return true;
        }
        return false;
    }

    static public function head($arr) {
        if (PHRamda::is("Array", $arr) && !PHRamda::isEmpty($arr)) {
            return $arr[0];
        }
        return $arr;
    }

    static public function last($arr) {
        if (PHRamda::is('Array', $arr) && !PHRamda::isEmpty($arr)) {
            return $arr[count($arr) - 1];
        }
        return $arr;
    }

    static public function toPairs($object) {
        // how to get the list of keys for a php object ..
        $list = array();
        foreach ($object as $key => $value) {
            $list[] = array($key, $value);
        }
        return $list;
    }

    static public function fromPairs($arr) {
        // assumes [[k0, v1], [k1, v1], ...]

    }
}
