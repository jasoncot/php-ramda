<?php
namespace Trailoff\PHRamda;

/**
 * extract a value/key from an object/array/associative-array.
 * @param  string $key              the key to look for in the subject
 * @param  object|array $subject    the target to search for the value
 * @return mixed                    the extracted value or null
 */
function prop(string $key, $subject = null)
{
    if (empty($key)) {
        return $subject;
    }
    if (!empty($subject) && $subject !== null) {
        if (is_object($subject) && property_exists($subject, $key)) {
            return $subject->{$key};
        } elseif (is_array($subject) && array_key_exists($key, $subject)) {
            return $subject[$key];
        }
    }
    return null;
}

function c_prop(string $key)
{
    return function ($subject) use ($key) {
        return prop($key, $subject);
    };
}
