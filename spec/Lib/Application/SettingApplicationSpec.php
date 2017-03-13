<?php

namespace spec\Galileo\SettingBundle\Lib\Application;

use Galileo\SettingBundle\Lib\Application\SettingApplication;
use Galileo\SettingBundle\Lib\Infrastructure\Internal\InMemorySettingRepository;
use Galileo\SettingBundle\Lib\Model\SettingRepository;
use Galileo\SettingBundle\Lib\Model\ValueObject\Key;
use Galileo\SettingBundle\Lib\Model\ValueObject\Value;
use PhpSpec\ObjectBehavior;

class SettingApplicationSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new InMemorySettingRepository([['set_key', 'stored_value', null]]));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(SettingApplication::class);
    }

    public function it_returns_null_for_not_found()
    {
        $this->get('name')->shouldReturn(null);
    }

    public function it_can_return_default_value_for_not_found()
    {
        $this->get('name', 'default')->shouldReturn('default');
    }

    public function it_favorites_persisted_value_over_default()
    {
        $this->get('set_key', 'forced_default')->shouldReturn('stored_value');
    }

    public function it_returns_value_from_persistence_mechanism(SettingRepository $settingRepository)
    {
        $settingRepository->findFor(new Key('set_key'))->willReturn(Value::fromString('stored_value'));

        $this->get('set_key')->shouldReturn('stored_value');
    }

    public function it_can_store_new_key_value()
    {
        $this->set('new_key', 'new_key_created');

        $this->get('new_key')->shouldReturn('new_key_created');
    }

    public function it_can_update_current_key_value()
    {
        $this->set('set_key', 'updated_value');
        $this->get('set_key')->shouldReturn('updated_value');
    }
}
