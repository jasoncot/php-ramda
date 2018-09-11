<?php
declare(strict_types=1);

namespace Trailoff\PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function Trailoff\PHRamda\path;

final class PathTest extends TestCase
{
    public function testPath(): void
    {
        $testSubject = new \stdClass();
        $testSubject->key1 = new \stdClass();
        $testSubject->key1->target = "testValue";

        $this->assertEquals("testValue", path(["key1", "target"], $testSubject));
    }

    public function testPathWithAssociativeArray(): void
    {
        $testSubject = ["key1" => ["target" => "testValue"]];
        $this->assertEquals("testValue", path(["key1", "target"], $testSubject));
    }

    public function testPathToNonExistantProperty(): void
    {
        $testSubject = new \stdClass();
        $testSubject->key1 = new \stdClass();
        $testSubject->key1->target = "testValue";

        $this->assertEquals(null, path(["key1", "target", "missingSubkey"], $testSubject));
    }

    public function testPathToNonExistantPropertyAssoc(): void
    {
        $testSubject = ["key1" => ["target" => "testValue"]];
        $this->assertEquals(null, path(["key1", "target", "missingSubkey"], $testSubject));
    }
}
