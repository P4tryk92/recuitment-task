<?php

declare(strict_types=1);

require_once dirname(__DIR__).'/vendor/autoload.php';

use PragmaGoTech\Interview\FeeCalculator;
use PragmaGoTech\Interview\Model\LoanProposal;

$loanProposal = new LoanProposal(12, 2750);
$calculator = new FeeCalculator();
$fee = $calculator->calculate($loanProposal);

echo $fee;