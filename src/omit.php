<?php
namespace Trailoff\PHRamda;

use function \Trailoff\PHRamda\keys;
use function \Trailoff\PHRamda\prop;
use function \Trailoff\PHRamda\reduce;
use function \Trailoff\PHRamda\indexOf;

function omit($omitKeys, $subject)
{
    $subjectKeys = keys($subject);
    return reduce(
        function ($acc, $key) use ($omitKeys, $subject) {
            if (indexOf($key, $omitKeys) === -1) {
                return assoc($key, prop($key, $subject), $acc);
            }
            return $acc;
        },
        is_array($subject) ? [] : new \stdClass(),
        $subjectKeys
    );
}
