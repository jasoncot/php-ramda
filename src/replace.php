<?php
namespace PHRamda;

use PHRamda\indexOf;

/**
 * replace :: a -> b -> c
 * swtich out some value for another value
 * @param  mixed $target      [description]
 * @param  mixed $replaceWith [description]
 * @param  mixed $subject     [description]
 * @return [type]              [description]
 */
function replace($target, $replaceWith, $subject) {
    if (!empty($subject)) {
        if (is_string($subject)) {
        $firstInstance = indexOf($target, $subject);
        return $firstInstance < 0 ?
            $subject :
            substr_replace(
                $subject,
                $replaceWith,
                $firstInstance,
                strlen($target)
            );
        }
        if (is_array($subject)) {
            $targetPosition = indexOf($target, $subject);
            if ($targetPosition < 0) {
                return $subject;
            }
            return array_merge(
                array_slice($subject, 0, $targetPosition),
                [$replaceWith],
                array_slice($subject, $targetPosition + 1)
            );
        }
    }
    return $subject;
}

function c_replace($target)
{
  return function ($replaceWith) use ($target) {
    return function ($subject) use ($target, $replaceWith) {
      return replace($target, $replaceWith, $subject);
    };
  };
}
