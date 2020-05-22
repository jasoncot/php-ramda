<?php
namespace PHRamda\Monads;
use PHRamda\Monads\Monad;
use PHRamda\Monads\interfaces\Monad as MonadInterface;
use PHRamda\Functors\Interfaces\Applicative;
use PHRamda\Functors\Interfaces\Functor;

class Identity extends Monad implements MonadInterface
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

  public function bind(callable $f): MonadInterface
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

  public function map(callable $f): Functor
  {
    return static::pure($f($this->get()));
  }
}
