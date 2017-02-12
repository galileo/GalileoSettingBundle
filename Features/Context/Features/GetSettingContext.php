<?php

namespace Galileo\SettingBundle\Features\Context\Features;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;

trait GetSettingContext
{

    /**
     * @Given /^there are persisted settings in storage system$/
     */
    public function thereArePersistedSettingsInStorageSystem(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @When /^you try to get (.*)$/
     */
    public function youTryToGetNotExisting($settingName)
    {
        var_dump($settingName);

        throw new PendingException();
    }

    /**
     * @Then /^you should get setting with (.*) value$/
     */
    public function youShouldGetSettingWithValue($null)
    {
        throw new PendingException();
    }
}
