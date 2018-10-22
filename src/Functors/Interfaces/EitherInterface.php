<?php
namespace PHRamda\Functors\Interfaces;

use PHRamda\Monads\Monad;
use PHRamda\Functors\Interfaces\Applicative;
use PHRamda\Functors\Interfaces\Functor;

interface EitherInterface
{
    public static function pure($value): Applicative;
    // public static function right($value): Either;
    // public static function left($value): Either;
    // public static function fromValue($left, $right, $nullValue = null): Either;
    public function get();

    /**
     * I'm not sure if this is implemented in the correct method. should it return pure?
     * @param  callable $callback function to call with the current $this->value
     * @return Monad              a Monad compatable return object
     */
    public function bind(callable $callback): Monad;
    public function apply(Applicative $f): Applicative;
    public function isLeft(): bool;
    public function isRight(): bool;
    public function getLeft($default);
    public function getRight($default);
    public function getOrElse($default);
    public function orElse(EitherInterface $either): EitherInterface;

    // abstract public function map(callable $callback): Functor;

    /**
     * flatMap: f(a -> b) -> Either b
     * @param callable $callback function to call on the contained value
     * @return Either            lifted result
     */
    public function flatMap(callable $callback): EitherInterface;
    public function filter(callable $callback, $error): EitherInterface;
}
