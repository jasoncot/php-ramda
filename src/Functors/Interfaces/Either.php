<?php
namespace PHRamda\Functors\Interfaces;

use PHRamda\Functors\Interfaces\Applicative;
use PHRamda\Functors\Interfaces\Functor;
use PHRamda\Monads\interfaces\Monad;

interface Either extends Monad
{
    public static function pure($value): Applicative;

    public function get();
    public function bind(callable $callback): Monad;
    public function apply(Applicative $f): Applicative;
    public function isLeft(): bool;
    public function isRight(): bool;
    public function getLeft($default);
    public function getRight($default);
    public function getOrElse($default);
    public function orElse(Either $either): Either;
    public function flatMap(callable $callback): Either;
    public function filter(callable $callback, $error): Either;
}
