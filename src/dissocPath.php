<?php
namespace PHRamda;

use function PHRamda\assocPath;
use function PHRamda\dissoc;
use function PHRamda\path;

function dissocPath(array $idx, $subject)
{
    $lensCount = count($idx);
    if ($lensCount > 0) {
        $subIdx = array_slice($idx, 0, $lensCount - 1);
        return assocPath(
            $subIdx,
            dissoc(end($idx), path($subIdx, $subject)),
            $subject
        );
    }
    return $subject;
}
