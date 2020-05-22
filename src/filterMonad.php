<?php
namespace PHRamda;

use PHRamda\Monads\Identity as IdentityMonad;

// assumes $collection is a collection of Monads
function filterMonad(callable $predicate, $collection)
{
  if (count($collection) === 0) {
    return IdentityMonad::pure([]);
  }

  $monad = $predicate(head($collection));

  $_filterM = function($collection) use($monad, $predicate, &$_filterM){
        if(count($collection) == 0) {
            return $monad->of([]);
        }

        $x = head($collection);
        $xs = tail($collection);

        return $predicate($x)->bind(function($bool) use($x, $xs, $monad, $_filterM) {
            return $_filterM($xs)->bind(function(array $acc) use($bool, $x, $monad) {
                if($bool) {
                    array_unshift($acc, $x);
                }

                return $monad->of($acc); 
            });
        });
    };
    return $_filterM($collection);
}
