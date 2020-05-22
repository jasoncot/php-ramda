<?php
namespace PHRamda\Functors;

use PHRamda\Functors\Interfaces\Applicative as ApplicativeInterface;
use PHRamda\Functors\Interfaces\Functor;

class Applicative implements ApplicativeInterface
{
  private $value;

  protected function __construct($value)
  {
    $this->value = $value;
  }

  public static function pure($value): ApplicativeInterface
  {
    return new self($value);
  }

  public function apply(ApplicativeInterface $f): ApplicativeInterface
  {
    return self::pure($this->get()($f->get()));
  }

  public function get()
  {
    return $this->value;
  }

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
