<?php
namespace PHRamda;

use PHRamda\Functors\Maybe;
use function PHRamda\map;
use function PHRamda\reduce;

function liftMaybe(callable $callback): callable
{
    return function (...$args) use ($callback) {
        $status = reduce(
            function ($status, Maybe $maybe) {
                return $maybe->isNothing() ? false : $status;
            },
            true,
            $args
        );

        if ($status) {
            $argValues = map(
                function (Maybe $maybe) {
                    return $maybe->getOrElse(null);
                },
                $args
            );
            return Maybe::just($callback(...$argValues));
        }
        return Maybe::nothing();
    };
}
