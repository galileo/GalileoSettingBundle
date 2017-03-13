<?php

namespace Galileo\SettingBundle\Features\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Galileo\SettingBundle\Lib\Application\SettingApplication;
use Galileo\SettingBundle\Lib\Infrastructure\Internal\InMemorySettingRepository;

class CreateSettingsContext implements Context
{
    private $settings;

    /**
     * @Given there is nothing registered in storage system
     */
    public function thereIsNothingRegisteredInStorageSystem()
    {
        $this->settings = new SettingApplication(new InMemorySettingRepository([]));
    }

    /**
     * @When you try to create new setting named :settingName with value :settingValue
     */
    public function youTryToCreateNewSettingNamedWithValue($settingName, $settingValue)
    {

    }
}
