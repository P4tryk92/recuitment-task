<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview;

use PragmaGoTech\Interview\Model\LoanProposal;

class FeeCalculator implements FeeCalculatorInterface
{
    private const MULTIPLIED_NUMBER = 5;

    /**
     * @param LoanProposal $application
     *
     * @return float
     */
    public function calculate(LoanProposal $application): float
    {
        $term = new TwelveMonthsTerm();

        if ($application->term() === 24) {
            $term = new TwentyFourMonthsTerm();
        }

        if (array_key_exists($application->amount(), $term::FEE_STRUCTURE)) {
            return self::_getFeeWithRounding($application->amount(), $term::FEE_STRUCTURE[$application->amount()]);
        }

        $lowerAndUpperBounds = $term->getLowerAndUpperBound($application->amount());
        $lowerBound = $lowerAndUpperBounds["lower"];
        $upperBound = $lowerAndUpperBounds["upper"];

        $linearInterpolation = new LinearInterpolation();
        $feeWithoutRounding = $linearInterpolation(
            $application->amount(),
            $lowerBound,
            $upperBound,
            $term::FEE_STRUCTURE[$lowerBound],
            $term::FEE_STRUCTURE[$upperBound]
        );

        return self::_getFeeWithRounding($application->amount(), $feeWithoutRounding);
    }

    /**
     * @param $amount
     * @param $feeWithoutRounding
     *
     * @return float
     */
    private function _getFeeWithRounding($amount, $feeWithoutRounding): float
    {
        $amountAndFeeAfterRounding = Rounder::roundUpWithExactMultiple(
            $amount + $feeWithoutRounding,
            self::MULTIPLIED_NUMBER
        );

        return $amountAndFeeAfterRounding - $amount;
    }
}
