<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview;

class LinearInterpolation
{
    /**
     * @param float $x  - amount
     * @param float $x0 - lower bound
     * @param float $x1 - upper bound
     * @param float $y0 - lower bound fee
     * @param float $y1 - upper bound fee
     *
     * @return float - linear interpolation
     */
    public function __invoke(float $x, float $x0, float $x1, float $y0, float $y1): float
    {
        $d = ($x - $x0) / ($x1 - $x0); // value in the range of [x, x1]
        return $y0 * (1 - $d) + $y1 * $d; // interpolated value
    }
}
