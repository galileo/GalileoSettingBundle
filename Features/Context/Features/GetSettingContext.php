<?php

namespace Galileo\SettingBundle\Features\Context\Features;

use Behat\Gherkin\Node\TableNode;
use Galileo\SettingBundle\Lib\Application\SettingApplication;
use Galileo\SettingBundle\Lib\Infrastructure\Internal\InMemorySettingRepository;
use Galileo\SettingBundle\Lib\Model\Setting;

trait GetSettingContext
{
    /**
     * @var SettingApplication
     */
    private $settingService;

    /**
     * @var Setting
     */
    private $responseValue;

    /**
     * @Given /^there are persisted settings in storage system$/
     */
    public function thereArePersistedSettingsInStorageSystem(TableNode $table)
    {
        $this->settingService = new SettingApplication(new InMemorySettingRepository($table->getRows()));
    }

    /**
     * @When /^you try to get ([a-z_]*)$/
     */
    public function youTryToGetNotExisting($settingName)
    {
        $this->responseValue = $this->settingService->get($settingName);
    }

    /**
     * @When you try to get :setting within :section
     *
     * @param string $setting
     * @param string $section
     */
    public function youTryToGetSettingWithinSection($setting, $section)
    {
        $this->responseValue = $this->settingService->section($section)->get($setting, 'null');
    }

    /**
     * @When /^you try to get ([a-z_]*) with default value '(.*)'$/
     */
    public function youTryToGetNotExistingWithDefaultValue($setting, $value)
    {
        $this->responseValue = $this->settingService->get($setting, $value);
    }


    /**
     * @Then /^you should get setting with (.*) value$/
     */
    public function youShouldGetSettingWithValue($value)
    {
        if ($value == 'null') {
            $value = null;
        }

        assert($value ===$this->responseValue, "[$value] compared to [$this->responseValue]");
    }
}
