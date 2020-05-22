<?php
namespace PHRamda\Functors;
use PHRamda\Monads\Monad;
use PHRamda\Monads\interfaces\Monad as MonadInterface;
use PHRamda\Functors\Interfaces\Applicative;
use PHRamda\Functors\Interfaces\Functor;
use PHRamda\Functors\Interfaces\Either as EitherInterface;

abstract class Either extends Monad implements EitherInterface
{
    protected $value;
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function get()
    {
      return $this->value;
    }

    /**
     * I'm not sure if this is implemented in the correct method. should it return pure?
     * @param  callable $callback function to call with the current $this->value
     * @return Monad              a Monad compatable return object
     */
    public function bind(callable $callback): MonadInterface
    {
      return static::pure($callback($this->get()));
    }

    public function apply(Applicative $f): Applicative
    {
      return static::pure($f->get()($this->get()));
    }

    abstract public function isLeft(): bool;
    abstract public function isRight(): bool;
    abstract public function getLeft($default);
    abstract public function getRight($default);
    abstract public function getOrElse($default);
    abstract public function orElse(EitherInterface $either): EitherInterface;

    // abstract public function map(callable $callback): Functor;

    /**
     * flatMap: f(a -> b) -> Either b
     * @param callable $callback function to call on the contained value
     * @return Either            lifted result
     */
    abstract public function flatMap(callable $callback): EitherInterface;
    abstract public function filter(callable $callback, $error): EitherInterface;
}
