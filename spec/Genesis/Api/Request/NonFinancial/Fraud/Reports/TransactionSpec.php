<?php

namespace spec\Genesis\Api\Request\NonFinancial\Fraud\Reports;

use Genesis\Api\Request\NonFinancial\Fraud\Reports\Transaction;
use PhpSpec\ObjectBehavior;
use spec\SharedExamples\Genesis\Api\Request\NonFinancial\Fraud\TransactionExample;
use spec\SharedExamples\Genesis\Api\Request\RequestExamples;

class TransactionSpec extends ObjectBehavior
{
    use RequestExamples;
    use TransactionExample;

    public function it_is_initializable()
    {
        $this->shouldHaveType(Transaction::class);
    }
}
