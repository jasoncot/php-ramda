<?php
namespace Trailoff\PHRamda;

use Trailoff\PHRamda\Functors\Either;
use function Trailoff\PHRamda\map;
use function Trailoff\PHRamda\reduce;

function liftEither(callable $callback, $error = "An error occured")
{
    return function (...$args) use ($callback) {
        $status = reduce(
            function ($status, Either $either) {
                return $either->isLeft() ? false : $status;
            },
            true,
            $args
        );

        if ($status) {
            $argValues = map(
                function (Either $either) {
                    return $either->getRight(null);
                },
                $args
            );
            return Either::right($callback(...$argValues));
        }
        return Either::left($error);
    };
}
