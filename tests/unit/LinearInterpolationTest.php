<?php

declare(strict_types=1);

namespace unit;

use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\LinearInterpolation;

final class LinearInterpolationTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testLinearInterpolation(float $x, float $x0, float $x1, float $y0, float $y1, float $expected): void
    {
        $linearInterpolation = new LinearInterpolation();
        $result = $linearInterpolation($x, $x0, $x1, $y0, $y1);

        $this->assertEquals($expected, $result);
    }

    public function additionProvider(): array
    {
        return [
            [1500, 1000, 2000, 70, 100, 85],
            [1000, 1000, 2000, 70, 100, 70],
            [11500, 11000, 12000, 440, 480, 460],
            [19250, 19000, 20000, 380, 400, 385],
            [19250.50, 19000, 20000, 380, 400, 385.01]
        ];
    }
}
