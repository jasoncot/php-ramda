<?php
namespace PHRamda;

use function \PHRamda\keys;
use function \PHRamda\prop;
use function \PHRamda\reduce;
use function \PHRamda\indexOf;

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
