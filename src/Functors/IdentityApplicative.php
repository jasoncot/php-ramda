<?php
namespace PHRamda\Functors;
use PHRamda\Functors\Interfaces\Applicative;
use PHRamda\Functors\Interfaces\Functor;

class IdentityApplicative extends Applicative
{
  private $value;

  protected function  __construct($value)
  {
    $this->value = $value;
  }

  public static function pure($value): Applicative
  {
    return new static($value);
  }

  public function apply(Appliactive $f): Applicative
  {
    return static::pure($this->get()($f->get()));
  }

  public function get()
  {
    return $this->value;
  }
}
