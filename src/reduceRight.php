<?php
namespace PHRamda;

/**
 * [reduceRight description]
 * @param  callale  $callback     Mapping function, expects an accumlated input and an item from the list
 * @param  mixed    $initialValue the initial value for the reduce
 * @param  mixed[]  $list         the list of items to reduce over
 * @return mixed                the reduced value
 */

function reduceRight(callable $callback, $initialValue, array $list)
{
    if (!isset($callback) || !isset($initialValue) || !isset($list)) {
        return null;
    }
    $count = count($list);
    $acc = $initialValue;
    if ($count > 0) {
        for ($i = 0; $i < $count; $i += 1) {
            $acc = $callback($acc, $list[$i], $i);
        }
    }
    return $acc;
}
