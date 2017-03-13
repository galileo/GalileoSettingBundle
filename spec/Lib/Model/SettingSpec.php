<?php

namespace spec\Galileo\SettingBundle\Lib\Model;

use Galileo\SettingBundle\Lib\Model\Setting;
use PhpSpec\ObjectBehavior;

class SettingSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Setting::class);
    }

    function it_can_be_created_with_values()
    {

    }

    function it_values_can_be_changed()
    {
    }

    function it_protects_keys_against_multiple_change()
    {

    }
}
