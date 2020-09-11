<?php

namespace spec\Genesis\API\Request\Base\Financial\Cards;

use Genesis\Exceptions\ErrorParameter;
use PhpSpec\ObjectBehavior;
use spec\Genesis\API\Stubs\Base\Request\Financial\Cards\BaseCreditCardAttributesStub;
use spec\SharedExamples\Genesis\API\Request\RequestExamples;

class BaseCreditCardAttributesSpec extends ObjectBehavior
{
    use RequestExamples;

    public function let()
    {
        $this->beAnInstanceOf(BaseCreditCardAttributesStub::class);
    }

    public function it_should_fail_when_missing_required_params()
    {
        $this->testMissingRequiredParameters([
            'transaction_id',
            'amount',
            'currency',
            'card_holder',
        ]);
    }

    public function it_should_fail_when_invalid_credit_card_parameter()
    {
        $this->setRequestParameters();
        $this->setCardNumber('47123jj');

        $this->shouldThrow(ErrorParameter::class)->during('getDocument');
    }

    public function it_should_fail_when_invalid_cc_exp_month_parameter()
    {
        $this->setRequestParameters();
        $this->setExpirationMonth('13');

        $this->shouldThrow(ErrorParameter::class)->during('getDocument');
    }

    public function it_should_fail_when_invalid_cc_exp_year_parameter()
    {
        $this->setRequestParameters();
        $this->setExpirationYear('201');

        $this->shouldThrow(ErrorParameter::class)->during('getDocument');
    }

    protected function setRequestParameters()
    {
        $faker = $this->getFaker();

        $this->setTransactionId($faker->numberBetween(1, PHP_INT_MAX));
        $this->setAmount($faker->numberBetween(1, PHP_INT_MAX));
        $this->setCurrency('USD');
        $this->setCardHolder($faker->name);
        $this->setCardNumber('4200000000000000');
        $this->setExpirationMonth($faker->numberBetween(1, 12));
        $this->setExpirationYear($faker->numberBetween(date('Y'), date('Y') + 5));
    }
}
