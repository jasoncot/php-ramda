<?php
namespace PHRamda;

/**
 * @param mixed $callbacks
 * @param mixed $subjects
 * @return mixed
 */
function ap($callbacks, $subjects)
{
    $callbackCount = count($callbacks);
    $results = [];
    foreach ($callbacks as $callback) {
        $subjectCount = count($subjects);

        for ($j = 0; $j < $subjectCount; $j += 1) {
            $results[] = $callback($subjects[$j]);
        }
    }
    return $results;
}
