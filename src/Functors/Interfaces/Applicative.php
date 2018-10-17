<?php
namespace PHRamda\Functors\Interfaces;

abstract class Applicative implements Functor
{
    public abstract static function pure($value);
    public abstract function apply(Applicative $f): Applicative;
    public function map(callable $f): Functor
    {
        return $this->pure($f)->apply($this);
    }
}
