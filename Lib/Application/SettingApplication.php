<?php

namespace Galileo\SettingBundle\Lib\Application;

use Galileo\SettingBundle\Lib\Model\Setting;
use Galileo\SettingBundle\Lib\Model\SettingRepository;
use Galileo\SettingBundle\Lib\Model\ValueObject\Key;
use Galileo\SettingBundle\Lib\Model\ValueObject\Value;

class SettingApplication
{
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function get($settingKey, $defaultValue = null)
    {
        $setting = $this->settingRepository->findFor(new Key($settingKey));

        if (null === $setting) {
            return $defaultValue;
        }

        return $setting->value();
    }

    public function set($keyName, $valueString)
    {
        $key = Key::fromString($keyName);
        $value = Value::fromString($valueString);
        $setting = $this->settingRepository->findFor($key);

        if (null == $setting) {
            $setting = Setting::issueNew($key, $value);
        }

        $setting->changeValue($value);

        $this->settingRepository->save($setting);
    }
}
