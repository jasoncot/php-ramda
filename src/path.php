<?php
namespace Trailoff\PHRamda;

use \Trailoff\PHRamda\prop;

function path(array $idx, $subject = null)
{
    if (empty($idx)) {
        return $subject;
    }
    if ($subject === null) {
        return null;
    }
    $key = $idx[0];
    return path(array_slice($idx, 1), prop($key, $subject));
}

function c_path(array $idx)
{
    return function ($subject = null) use ($idx) {
        return path($idx, $subject);
    };
}
