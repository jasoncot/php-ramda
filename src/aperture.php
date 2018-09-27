<?php
namespace PHRamda;

function aperture(int $count, array $subject): array
{
    $ret = [];
    $subjectCount = count($subject);
    if ($count > 0 && $count <= $subjectCount) {
        $delta = $subjectCount - $count + 1;
        for ($i = 0; $i < $delta; $i += 1) {
            $ret[] = array_slice($subject, $i, $count);
        }
    }
    return $ret;
}

function c_aperture(int $count): Closure
{
    return function (array $subject) use ($count): array
    {
        return aperture($count, $subject);
    };
}
