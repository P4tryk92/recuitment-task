<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Model;

/**
 * A cut down version of a loan application containing
 * only the required properties for this test.
 */
class LoanProposal
{
    private int $_term;
    private float $_amount;

    /**
     * @param int   $term
     * @param float $amount
     */
    public function __construct(int $term, float $amount)
    {
        $this->_term = $term;
        $this->_amount = $amount;
    }

    /**
     * Term (loan duration) for this loan application
     * in number of months.
     */
    public function term(): int
    {
        return $this->_term;
    }

    /**
     * Amount requested for this loan application.
     */
    public function amount(): float
    {
        return $this->_amount;
    }
}
