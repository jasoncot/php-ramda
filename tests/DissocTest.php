<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\assoc;
use function PHRamda\dissoc;
use function PHRamda\pipe;

final class DissocTest extends TestCase
{
    public function testBaseCase(): void
    {
        $c_assoc = function ($key, $value) {
            return function ($subject) use ($key, $value) {
                return assoc($key, $value, $subject);
            };
        };


        $testSubject = new \stdClass();
        $testSubject->a = 'test';
        $testSubject->b = 'more items';

        $testSubject->c = pipe(
            $c_assoc('a', 'sub-item a'),
            $c_assoc('b', 'sub-item b'),
            $c_assoc('c', assoc('sub-sub-nested', 'sub-sub-item c', new \stdClass()))
        )(new \stdClass());

        $this->assertObjectHasAttribute('a', $testSubject);
        $this->assertObjectHasAttribute('b', $testSubject);
        $this->assertObjectHasAttribute('c', $testSubject);
        $this->assertObjectHasAttribute('a', $testSubject->c);
        $this->assertObjectHasAttribute('b', $testSubject->c);
        $this->assertObjectHasAttribute('c', $testSubject->c);
        $this->assertObjectHasAttribute('sub-sub-nested', $testSubject->c->c);
    }
}
