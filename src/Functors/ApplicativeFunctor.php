<?php
namespace PHRamda\Functors;

use PHRamda\Functors\Interfaces\Applicative;

class ApplicativeFunctor extends Applicative
{
  private $value;

  protected function __construct($value)
  {
    $this->value = $value;
  }

  public static function pure($value): Applicative
  {
    return new self($value);
  }

  public function apply(Applicative $f): Applicative
  {
    return self::pure($this->get()($f->get()));
  }

  public function get()
  {
    return $this->value;
  }
}
