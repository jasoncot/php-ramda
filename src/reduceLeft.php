<?php
namespace PHRamda;

/**
 * [reduceLeft description]
 * @param  callable $callback [description]
 * @param  mixed    $val      [description]
 * @param  mixed[]  $arr      [description]
 * @return mixed              [description]
 */
function reduceLeft(callable $callback, $val, array $arr)
{
    if (!isset($callback) || !isset($val) || !isset($arr)) {
        return null;
    }
    $count = count($arr);
    $acc = $val;
    if ($count > 0) {
        while ($count--) {
            $acc = $callback($acc, $arr[$count], $count);
        }
    }
    return $acc;
}
