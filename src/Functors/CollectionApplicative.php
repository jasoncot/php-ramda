<?php
namespace PHRamda\Functors;

use PHRamda\Functors\Interfaces\Applicative;

class CollectionApplicative extends Applicative implements IteratorAggregator
{
  private $values;

  protected function __construct($values)
  {
    $this->values = $values;
  }

  public static function pure($values): Applicative
  {
    if ($values instanceof Travserable) {
      $values = interator_to_array($values);
    } elseif (!is_array($values)) {
      $values = [$values];
    }
    return new static($values);
  }

  public function apply(Applicative $data): Applicative
  {
    return $this->pure(
      array_reduce(
        $this->values,
        function ($acc, callable $function) use ($data) {
          return array_merge($acc,  array_map($function, $data->values));
        },
        []
      )
    );
  }

  public function getIterator()
  {
    return new ArrayIterator($this->values);
  }
}
