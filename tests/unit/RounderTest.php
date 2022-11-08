<?php

declare(strict_types=1);

namespace unit;

use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\Rounder;

final class RounderTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testRoundUpWithExactMultiple(float $number, int $multipliedNumber, int $expected): void
    {
        $result = Rounder::roundUpWithExactMultiple($number, $multipliedNumber);

        $this->assertEquals($expected, $result);
    }

    public function additionProvider(): array
    {
        return [
            [10, 5, 10],
            [2751, 5, 2755],
            [2751.55, 5, 2755],
            [4, 2, 4],
            [4.59, 2, 6],
            [313.8954, 2, 314],
            [4.59, 10, 10],
            [0, 10, 0],
            [515, 10, 520],
            [-2, 10, 0],
            [-515.59, 10, -510],
            [-99, 10, -90]
        ];
    }
}
