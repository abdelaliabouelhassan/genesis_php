<?php

namespace spec\Genesis\API\Constants;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

// @codingStandardsIgnoreStart
class i18nSpec extends ObjectBehavior
// @codingStandardsIgnoreEnd
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Genesis\API\Constants\i18n');
    }

    public function it_should_have_support_for_all_checkout_language()
    {
        $languages = array(
            'en', 'it', 'es', 'fr', 'fr', 'de', 'ja', 'zh', 'ar', 'pt',
            'tr', 'ru', 'hi', 'bg', 'id', 'ms', 'th', 'cs', 'hr', 'sl'
        );

        foreach ($languages as $iso_code) {
            $this::isValidLanguageCode($iso_code)->shouldBe(true);
        }
    }

    public function it_should_validate_supported_languages()
    {
        $this::isValidLanguageCode('en')->shouldBe(true);

        $this::isValidLanguageCode('zh')->shouldBe(true);
    }

    public function it_should_handle_unsupported_languages()
    {
        $this::isValidLanguageCode('us')->shouldBe(false);

        $this::isValidLanguageCode('cn')->shouldBe(false);
    }

    public function it_should_handle_invalid_input()
    {
        $this::isValidLanguageCode('en_US')->shouldBe(false);

        $this::isValidLanguageCode(null)->shouldBe(false);

        $this::isValidLanguageCode(0)->shouldBe(false);

        $this::isValidLanguageCode("\x00")->shouldBe(false);

        $this::isValidLanguageCode(' ')->shouldBe(false);
    }

    public function it_should_be_getall_array()
    {
        $this::getAll()->shouldBeArray();
    }
}
