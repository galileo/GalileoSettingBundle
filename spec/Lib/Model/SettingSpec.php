<?php

namespace spec\Galileo\SettingBundle\Lib\Model;

use Galileo\SettingBundle\Lib\Model\Setting;
use Galileo\SettingBundle\Lib\Model\ValueObject\Key;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;
use Galileo\SettingBundle\Lib\Model\ValueObject\Value;
use PhpSpec\ObjectBehavior;

class SettingSpec extends ObjectBehavior
{
    function it_is_initializable(Key $key, Value $value, Section $section)
    {
        $this->beConstructedThrough('issue', [$key, $value, $section]);
        $this->shouldHaveType(Setting::class);
    }

    function it_can_be_created_with_values()
    {
        $this->beConstructedThrough('issue', [new Key('key'), new Value('value'), Section::blank()]);

        $this->name()->shouldReturn('key');
        $this->value()->shouldReturn('value');
        $this->section()->shouldReturn(Section::EMPTY_SECTION);
    }

    function it_values_can_be_changed()
    {
        $this->beConstructedThrough('issue', [new Key('key'), new Value('value'), Section::blank()]);

        $this->changeValue(new Value('new_value'));

        $this->value()->shouldReturn('new_value');
    }
}
