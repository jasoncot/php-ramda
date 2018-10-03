<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\assoc;
use function PHRamda\dissocPath;
use function PHRamda\pipe;

final class DissocPathTest extends TestCase
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

        $testSubject = dissocPath(['a'], $testSubject);
        $this->assertObjectNotHasAttribute('a', $testSubject);
        $this->assertObjectHasAttribute('b', $testSubject);
        $this->assertObjectHasAttribute('c', $testSubject);
        $this->assertObjectHasAttribute('a', $testSubject->c);
        $this->assertObjectHasAttribute('b', $testSubject->c);
        $this->assertObjectHasAttribute('c', $testSubject->c);
        $this->assertObjectHasAttribute('sub-sub-nested', $testSubject->c->c);

        $testSubject = dissocPath(['b'], $testSubject);
        $this->assertObjectNotHasAttribute('a', $testSubject);
        $this->assertObjectNotHasAttribute('b', $testSubject);
        $this->assertObjectHasAttribute('c', $testSubject);
        $this->assertObjectHasAttribute('a', $testSubject->c);
        $this->assertObjectHasAttribute('b', $testSubject->c);
        $this->assertObjectHasAttribute('c', $testSubject->c);
        $this->assertObjectHasAttribute('sub-sub-nested', $testSubject->c->c);

        $testSubject = dissocPath(['c', 'a'], $testSubject);
        $this->assertObjectNotHasAttribute('a', $testSubject);
        $this->assertObjectNotHasAttribute('b', $testSubject);
        $this->assertObjectHasAttribute('c', $testSubject);
        $this->assertObjectNotHasAttribute('a', $testSubject->c);
        $this->assertObjectHasAttribute('b', $testSubject->c);
        $this->assertObjectHasAttribute('c', $testSubject->c);
        $this->assertObjectHasAttribute('sub-sub-nested', $testSubject->c->c);

        $testSubject = dissocPath(['c', 'b'], $testSubject);
        $this->assertObjectNotHasAttribute('a', $testSubject);
        $this->assertObjectNotHasAttribute('b', $testSubject);
        $this->assertObjectHasAttribute('c', $testSubject);
        $this->assertObjectNotHasAttribute('a', $testSubject->c);
        $this->assertObjectNotHasAttribute('b', $testSubject->c);
        $this->assertObjectHasAttribute('c', $testSubject->c);
        $this->assertObjectHasAttribute('sub-sub-nested', $testSubject->c->c);

        $testSubject = dissocPath(['c', 'c', 'sub-sub-nested'], $testSubject);
        $this->assertObjectNotHasAttribute('a', $testSubject);
        $this->assertObjectNotHasAttribute('b', $testSubject);
        $this->assertObjectHasAttribute('c', $testSubject);
        $this->assertObjectNotHasAttribute('a', $testSubject->c);
        $this->assertObjectNotHasAttribute('b', $testSubject->c);
        $this->assertObjectHasAttribute('c', $testSubject->c);
        $this->assertObjectNotHasAttribute('sub-sub-nested', $testSubject->c->c);

        $testSubject = dissocPath(['c', 'c'], $testSubject);
        $this->assertObjectNotHasAttribute('a', $testSubject);
        $this->assertObjectNotHasAttribute('b', $testSubject);
        $this->assertObjectHasAttribute('c', $testSubject);
        $this->assertObjectNotHasAttribute('a', $testSubject->c);
        $this->assertObjectNotHasAttribute('b', $testSubject->c);
        $this->assertObjectNotHasAttribute('c', $testSubject->c);

        $testSubject = dissocPath(['c'], $testSubject);
        $this->assertObjectNotHasAttribute('a', $testSubject);
        $this->assertObjectNotHasAttribute('b', $testSubject);
        $this->assertObjectNotHasAttribute('c', $testSubject);
    }
}
