<?php
namespace Trailoff\PHRamda\Functors;

class Maybe {
    protected $value;
    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function of($value): Maybe
    {
        return new Maybe($value);
    }

    public function isJust(): bool
    {
        if ($this->value === null) {
            return false;
        }
        return true;
    }

    public function isNothing(): bool
    {
        return $this->value === null;
    }

    public function map($callback): Maybe
    {
        return Maybe.of($callback($this->value));
    }
}
