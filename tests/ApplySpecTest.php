<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\applySpec;

final class ApplySpecTest extends TestCase
{
    public function testBaseCase(): void
    {
        $testSubject = new \stdClass();
        $testSubject->testKey = function () {
            return 'static_value';
        };
        $testSubject->testKey_2 = function ($input) {
            return $input;
        };

        $result = applySpec($testSubject, 'applied_value');
        $this->assertObjectHasAttribute('testKey', $result, 'testKey was removed by the applySpec function.');
        $this->assertEquals('static_value', $result->testKey);

        $this->assertObjectHasAttribute('testKey_2', $result, 'testKey_2 was removed by the applySpec function.');
        $this->assertEquals('applied_value', $result->testKey_2);
    }
}
