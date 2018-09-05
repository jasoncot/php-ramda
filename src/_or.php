<?php
namespace Trailoff\PHRamda;
use function Trailoff\PHRamda\_isTruthy;

function _or($a, $b) {
    return _isTruthy($a) ? $a : $b;
}
