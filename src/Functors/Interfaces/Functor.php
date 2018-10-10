<?php
namespace PHRamda\Functors\Interfaces;

interface Functor
{
  public function map(callable $callback): Functor;
}
