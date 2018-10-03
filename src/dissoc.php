<?php
namespace PHRamda;

use function PHRamda\reduce;
use function PHRamda\keys;

function dissoc($property, $subject)
{
    if (is_array($subject) && key_exists($property, $subject)) {
        return reduce(
            function ($acc, $key) use ($property, $subject) {
                if ($key !== $property) {
                    $acc = $acc[$key] = $subject[$key];
                }
                return $acc;
            },
            [],
            keys($subject)
        );
    }
    if (is_object($subject) && \property_exists($subject, $property)) {
        return reduce(
            function ($acc, $key) use ($property, $subject) {
                if ($key !== $property) {
                    $acc->{$key} = $subject->{$key};
                }
                return $acc;
            },
            new \stdClass(),
            keys($subject)
        );
    }
    return $subject;
}
