<?php
namespace Trailoff\PHRamda;

use Trailoff\PHRamda\find;
/**
 * get the position of an item in a pool of items
 * @param  mixed $needle          What to look for
 * @param  string|array $haystack search space
 * @return int                    position of the needle or -1
 */
function indexOf($needle, $haystack)
{
    if (is_array($haystack)) {
        $cnt = count($haystack);
        for ($i = 0; $i < $cnt; $i += 1) {
            if ($haystack[$i] === $needle) {
                return $i;
            }
        }
        return -1;
    }

    if (is_string($haystack)) {
        $ret = strpos($haystack, $needle);
        return $ret === false ? -1 : $ret;
    }

    // all other types are not support
    return -1;
}
