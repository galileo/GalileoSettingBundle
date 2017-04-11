<?php

namespace spec\Galileo\SettingBundle\Lib\Model\Specification;

use Galileo\SettingBundle\Lib\Model\Specification\AlphaNumericSpecification;
use PhpSpec\ObjectBehavior;

class AlphaNumericSpecificationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(AlphaNumericSpecification::class);
    }

    public function it_should_pass_numeric_values()
    {
        $this->guard(12)->shouldReturn(null);
    }

    public function it_does_not_allow_special_characters()
    {
        $this->shouldThrow('Galileo\SettingBundle\Lib\Model\Exceptions\GuardException')->during(
            'guard',
            ['(*^%^&$#######)']
        );
    }
}
