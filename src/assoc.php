<?php
namespace Trailoff\PHRamda;

use function \Trailoff\PHRamda\keys;
use function \Trailoff\PHRamda\prop;
use function \Trailoff\PHRamda\reduce;

/**
 * place a value on a copy of the object, either associative array or object
 * @param  string           $key     the key to set or overwrite in the subject
 * @param  mixed            $value   the value to set
 * @param  array|\stdClass  $subject the target of setting the value
 * @return array|\stdClass           an object copy with the new value
 */
function assoc(string $prop, $value, $subject)
{
    if (is_array($subject)) {
        $retObject = reduce(
            function ($acc, $key) use ($subject) {
                $acc[$key] = prop($key, $subject);
                return $acc;
            },
            [],
            keys($subject)
        );
        $retObject[$prop] = $value;
        return $retObject;
    }

    $retObject = reduce(
        function ($acc, $key) use ($subject) {
            $acc->{$key} = prop($key, $subject);
            return $acc;
        },
        new \stdClass(),
        keys($subject)
    );
    $retObject->{$prop} = $value;
    return $retObject;
}
