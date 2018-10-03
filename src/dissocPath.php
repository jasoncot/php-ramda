<?php
namespace PHRamda;

use function PHRamda\assocPath;
use function PHRamda\dissoc;
use function PHRamda\path;
use function PHRamda\last;

function dissocPath(array $idx, $subject)
{
    $lensCount = count($idx);
    if ($lensCount > 0) {
        $subIdx = array_slice($idx, 0, $lensCount - 1);
        return assocPath(
            $subIdx,
            dissoc(last($idx), path($subIdx, $subject)),
            $subject
        );
    }
    return $subject;
}
