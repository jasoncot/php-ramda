<?php
declare(strict_types=1);

namespace Trailoff\PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function Trailoff\PHRamda\assocPath;
use function Trailoff\PHRamda\path;

final class AssocPathTest extends TestCase
{
    public function testAssocObject(): void
    {
        $testSubject = assocPath(["property"], "test-value", new \stdClass());
        $this->assertEquals("test-value", path(["property"], $testSubject));
    }

    public function testAssocObject_replaceValue(): void
    {
        $testSubject = assocPath(["property"], "test-value", new \stdClass());
        $testSubject = assocPath(["property"], "replaced-test-value-here", $testSubject);

        $this->assertEquals(
            "replaced-test-value-here",
            path(["property"], $testSubject)
        );
    }

    public function testAssocArray(): void
    {
        $testSubject = [];
        $testSubject = assocPath(["property"], "test-value", $testSubject);
        $this->assertEquals("test-value", path(["property"], $testSubject));
    }

    public function testAssocArray_replaceValue(): void
    {
        $testSubject = [];
        $testSubject = assocPath(["property"], "test-value", $testSubject);
        $testSubject = assocPath(["property"], "replaced-test-value-here", $testSubject);
        $this->assertEquals(
            "replaced-test-value-here",
            path(["property"], $testSubject)
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

        $assocedSubject = assocPath(
            ["testKey"],
            "a test value string",
            $testSubject
        );

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

        $assocedSubject = assocPath(
            ["testKey"],
            "a test value string",
            $testSubject
        );

        $this->assertEquals($testSubject->number, $assocedSubject->number);
        $this->assertEquals($testSubject->string, $assocedSubject->string);
        $this->assertEquals($testSubject->boolean, $assocedSubject->boolean);
        $this->assertEquals($testSubject->object, $assocedSubject->object);
        $this->assertEquals($testSubject->array, $assocedSubject->array);
        $this->assertEquals("a test value string", $assocedSubject->testKey);
    }

    public function testDeeplyNested(): void
    {
        $testSubject = new \stdClass();
        $testSubject->key1 = new \stdClass();
        $testSubject->key1->key2 = new \stdClass();
        $testSubject->key1->key2->key3 = new \stdClass();
        $testSubject->key1->key2->key3->keyValue = "testing with this value";
        $keyValueIdx = ['key1', 'key2', 'key3', 'keyValue'];
        $associated = assocPath(['key1', 'key2', 'keyValue'], "a new key value", $testSubject);
        $this->assertEquals("a new key value", path(['key1', 'key2', 'keyValue'], $associated));
        $this->assertEquals("testing with this value", path($keyValueIdx, $associated));

        $associated = assocPath($keyValueIdx, "updated again", $associated);
        $this->assertEquals("updated again", path($keyValueIdx, $associated));

    }

}
