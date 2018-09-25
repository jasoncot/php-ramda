<?php
namespace PHRamda;

function allPass(array $callbacks): \Closure
{
    return function (...$args) use ($callbacks) {
        $status = true;
        $cnt = count($callbacks);
        for ($i = 0; $i < $cnt; $i += 1) {
            $status = $status && $callbacks[$i](...$args);
        }
        return $status;
    };
}
