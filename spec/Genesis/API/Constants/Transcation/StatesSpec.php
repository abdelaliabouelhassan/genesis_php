<?php

namespace spec\Genesis\API\Constants\Transcation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StatesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Genesis\API\Constants\Transcation\States');
    }
}
