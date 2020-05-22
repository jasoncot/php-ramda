<?php

namespace PHRamda\Functors\Interfaces;

use PHRamda\Functors\Interfaces\Functor;

interface Applicative extends Functor
{
    public static function pure($value): Applicative;

    public function apply(Applicative $f): Applicative;
    public function map(callable $f): Functor;
}
