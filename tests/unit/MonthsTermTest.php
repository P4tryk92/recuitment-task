<?php

declare(strict_types=1);

namespace unit;

use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\TwelveMonthsTerm;

final class MonthsTermTest extends TestCase
{
    public function testGetLowerAndUpperBound(): void
    {
        $monthsTerm = new TwelveMonthsTerm();
        $amounts = array_keys($monthsTerm::FEE_STRUCTURE);
        $amount = $amounts[0] + 0.01;
        $result = $monthsTerm->getLowerAndUpperBound($amount);

        $this->assertEquals($amounts[0], $result['lower']);
        $this->assertEquals($amounts[1], $result['upper']);

        $amount = $amounts[1] - 0.01;
        $result = $monthsTerm->getLowerAndUpperBound($amount);

        $this->assertEquals($amounts[0], $result['lower']);
        $this->assertEquals($amounts[1], $result['upper']);
    }
}
