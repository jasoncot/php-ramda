<?php
namespace Trailoff\PHRamda;

function tap($fn) {
    return function ($a) use ($fn) {
        $fn($a);
        return $a;
    };
}
