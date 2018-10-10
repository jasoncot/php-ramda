<?php
namespace PHRamda\Functors;

use PHRamda\Functors\Interfaces\Functor;

class IdentityFunctor implements Functor
{
  private $value;

  public function __construct($value)
  {
    $this->value = $value;
  }

  public function map(callable $callback): Functor
  {
    return new self($f($this->value));
  }

  public function get()
  {
    return $this->value;
  }
}
