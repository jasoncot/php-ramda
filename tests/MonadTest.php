<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use PHRamda\Monads\Monad;
use PHRamda\Monads\Identity as IdentityMonad;

function check_monad_laws($x, Monad $m, callable $f, callable $g)
{
    return [
        'left identity' => $m->return($x)->bind($f) == $f($x),
        'right identity' => $m->bind([$m, 'return']) == $m,
        'associativity' => $m->bind($f)->bind($g) == $m->bind(
          function($x) use($f, $g) {
            return $f($x)->bind($g);
          }
        )
    ];
}

final class MonadTest extends TestCase
{
    public function testBaseCase(): void
    {
      $result = check_monad_laws(
        10,
        IdentityMonad::return(20),
        function(int $a) { return IdentityMonad::return($a + 10); },
        function(int $a) { return IdentityMonad::return($a * 2); }
      );

      $this->assertArrayHasKey('left identity', $result);
      $this->assertEquals(1, $result['left identity']);

      $this->assertArrayHasKey('right identity', $result);
      $this->assertEquals(1, $result['right identity']);

      $this->assertArrayHasKey('associativity', $result);
      $this->assertEquals(1, $result['associativity']);
    }
}
