<?php
namespace PHRamda\Monads;
use PHRamda\Monads\Monad;
use PHRamda\Functors\Interfaces\Applicative;

class IdentityMonad extends Monad
{
  private $value;

  public function __construct($value)
  {
    $this->value = $value;
  }

  public static function pure($value): Applicative
  {
    return new static($value);
  }

  public function get()
  {
    return $this->value;
  }

  public function bind(callable $f): Monad
  {
    return $f($this->get());
  }

  public function flatten()
  {
    // I do not quite understand what should go here.
    // flatMap previously referred to not lifting the execution of the function
    // back into the Container
  }

  /*
   * According to Functional-php, the following function is also called
   *  flatMap in scala.
   */
  public function apply(Applicative $a): Applicative
  {
    return static::pure($this->get()($a->get()));
  }
}
