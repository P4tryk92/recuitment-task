<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview;

class Rounder
{
    /**
     * @param float $number
     * @param int   $multipliedNumber
     *
     * @return float
     */
    public static function roundUpWithExactMultiple(float $number, int $multipliedNumber): float
    {
        return ceil(($number) / $multipliedNumber) * $multipliedNumber;
    }
}
