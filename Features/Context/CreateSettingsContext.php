<?php

namespace Galileo\SettingBundle\Features\Context;

use Behat\Behat\Context\Context;
use Galileo\SettingBundle\Lib\Application\SettingApplication;
use Galileo\SettingBundle\Lib\Infrastructure\Internal\InMemorySettingRepository;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;

class CreateSettingsContext implements Context
{
    /**
     * @var SettingApplication
     */
    private $settings;

    /**
     * @Given there is nothing registered in storage system
     */
    public function thereIsNothingRegisteredInStorageSystem()
    {
        $settingRepository = new InMemorySettingRepository([]);
        $this->settings = new SettingApplication($settingRepository);
    }

    /**
     * @Given there is already registered :key setting with :value value
     */
    public function alreadyRegisteredKeyWithValue($key, $value)
    {
        $this->settings = new SettingApplication(
            new InMemorySettingRepository([[$key, $value, Section::EMPTY_SECTION]])
        );
    }

    /**
     * @When you try to create new setting named :settingName with value :settingValue
     */
    public function youTryToCreateNewSettingNamedWithValue($settingName, $settingValue)
    {
        $this->settings->set($settingName, $settingValue);
    }

    /**
     * @Then the value for :key should be :value
     */
    public function theValueForKeyShouldBe($key, $value)
    {
        assert($value === $this->settings->get($key), 'Key value not the same as stored one');
    }
}
