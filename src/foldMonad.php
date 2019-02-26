<?php
namespace PHRamda;

use PHRamda\head;
use PHRamda\rest;
use PHRamda\Monads\Monad;

/**
 * [foldMonad description]
 * @param  callable $callback   Takes two arguments, accumlator and value returns a monad
 * @param  mixed    $initial    [description]
 * @param  array    $collection [description]
 * @return mixed                [description]
 */
function foldMonad(callable $callback, $initial, $collection)
{
  // assumes that there is a value in the collection or that the provided function
  // can handle a null value
  /** @var Monad $monad */
  $monad = $callback($initial, head($collection));

  $_foldM = function($acc, $collection) use ($monad, $callback, &$_foldM) {
    if (count($collection) == 0) {
      return $monad->of($acc);
    }

    $x = head($collection);
    $xs = rest($collection);

    /** @var Monad $resultMonad */
    $resultMonad = $callback($acc, $x);
    return $resultMonad->bind(
        function ($result) use ($acc, $xs, $_foldM): Monad
        {
          return $_foldM($result, $xs);
        }
      );
  };

  return $_foldM($initial, $collection);
}
