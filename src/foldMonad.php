<?php
namespace PHRamda;

function foldMonad(callable $callback, $initial, $collection)
{
  $monad = $callback($initial, head($collection));

    $_foldM = function($acc, $collection) use($monad, $callback, &$_foldM){
        if(count($collection) == 0) {
            return $monad->of($acc);
        }

        $x = head($collection);
        $xs = tail($collection);

        return $callback($acc, $x)->bind(function($result) use($acc,$xs,$_foldM) {
            return $_foldM($result, $xs);
        });
    };

    return $_foldM($initial, $collection);
}
