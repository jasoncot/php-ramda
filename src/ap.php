<?php
namespace PHRamda;

function ap(array $callbacks, array $subjects)
{
    $callbackCount = count($callbacks);
    $results = [];
    for ($i = 0; $i < $callbackCount; $i += 1) {
        $subjectCount = count($subjects);

        for ($j = 0; $j < $subjectCount; $j += 1) {
            $results[] = $callbacks[$i]($subjects[$j]);
        }
    }
    return $results;
}

function c_ap(array $callbacks)
{
    return function (array $subjects) use ($callbacks) {
        return ap($callbacks, $subjects);
    };
}
