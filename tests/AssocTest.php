<?php
declare(strict_types=1);

namespace Trailoff\PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function Trailoff\PHRamda\assoc;
use function Trailoff\PHRamda\prop;

final class AssocTest extends TestCase
{
    public function testAssocObject(): void
    {
        $testSubject = assoc("property", "test-value", new \stdClass());
        $this->assertEquals("test-value", prop("property", $testSubject));
    }

    public function testAssocObject_replaceValue(): void
    {
        $testSubject = assoc("property", "test-value", new \stdClass());
        $testSubject = assoc("property", "replaced-test-value-here", $testSubject);

        $this->assertEquals(
            "replaced-test-value-here",
            prop("property", $testSubject)
        );
    }

    public function testAssocArray(): void
    {
        $testSubject = [];
        $testSubject = assoc("property", "test-value", $testSubject);
        $this->assertEquals("test-value", prop("property", $testSubject));
    }

    public function testAssocArray_replaceValue(): void
    {
        $testSubject = [];
        $testSubject = assoc("property", "test-value", $testSubject);
        $testSubject = assoc("property", "replaced-test-value-here", $testSubject);
        $this->assertEquals(
            "replaced-test-value-here",
            prop("property", $testSubject)
        );
    }

    public function testAssocArray_shouldNotOverwriteAdjacentValues(): void
    {
        $testSubject = [];
        $testSubject['number'] = 123;
        $testSubject['string'] = "a string goes here";
        $testSubject['boolean'] = false;
        $testSubject['array'] = [1,2,3,4];
        $testSubject['object'] = new \stdClass();

        $assocedSubject = assoc("testKey", "a test value string", $testSubject);

        $this->assertEquals($testSubject['number'], $assocedSubject['number']);
        $this->assertEquals($testSubject['string'], $assocedSubject['string']);
        $this->assertEquals($testSubject['boolean'], $assocedSubject['boolean']);
        $this->assertEquals($testSubject['object'], $assocedSubject['object']);
        $this->assertEquals($testSubject['array'], $assocedSubject['array']);
        $this->assertEquals("a test value string", $assocedSubject['testKey']);
    }

    public function testAssocObject_shouldNotOverwriteAdjacentValues(): void
    {
        $testSubject = new \stdClass();
        $testSubject->number = 123;
        $testSubject->string = "a string goes here";
        $testSubject->boolean = false;
        $testSubject->array = [1,2,3,4];
        $testSubject->object = new \stdClass();

        $assocedSubject = assoc("testKey", "a test value string", $testSubject);

        $this->assertEquals($testSubject->number, $assocedSubject->number);
        $this->assertEquals($testSubject->string, $assocedSubject->string);
        $this->assertEquals($testSubject->boolean, $assocedSubject->boolean);
        $this->assertEquals($testSubject->object, $assocedSubject->object);
        $this->assertEquals($testSubject->array, $assocedSubject->array);
        $this->assertEquals("a test value string", $assocedSubject->testKey);
    }

}
