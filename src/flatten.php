<?php
namespace PHRamda;
use PHRamda\Functors\Monads\Monad;

function flatten($input)
{
  if (is_array($input)) {
    if (empty($input)) {
      return $input;
    }
    // if not empty, loop through and de-nest arrays
    return reduce(
      function ($acc, $item) {
        return array_merge($acc, is_array($item) ? flatten($item) : [$item]);
      },
      [],
      $input
    );
  }
  if ($input instanceof Monad) {
    $klass = get_class($input);
    $vKlass = get_class($input->get());
    if ($klass === $vKlass) {
      return flatten($input->get());
    }
  }

  return $input;
}
