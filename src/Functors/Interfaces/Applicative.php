<?php
namespace PHRamda\Functors\Interfaces;
use PHRamda\Functors\Interfaces\Functor;

abstract class Applicative implements Functor
{
    abstract public static function pure($value): Applicative;
    abstract public function apply(Applicative $f): Applicative;

    /**
     * apply a value to a provided function and provide a lifted result
     * @param  callable $f [description]
     * @return Functor     [description]
     */
    public function map(callable $f): Functor
    {
        return static::pure($f)->apply($this);
    }
}
