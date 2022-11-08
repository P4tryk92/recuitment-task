<?php

declare(strict_types=1);

namespace integration;

use PHPUnit\Framework\TestCase;
use PragmaGoTech\Interview\FeeCalculator;
use PragmaGoTech\Interview\Model\LoanProposal;

final class FeeCalculatorTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testCalculate($term, $amount, $expected): void
    {
        $loanProposal = new LoanProposal($term, $amount);
        $calculator = new FeeCalculator();
        $fee = $calculator->calculate($loanProposal);

        $this->assertEquals($expected, $fee);
    }

    public function additionProvider(): array
    {
        return [
            [24, 2750, 115.0],
            [24, 11500, 460.0],
            [12, 19250, 385.0],
        ];
    }
}
