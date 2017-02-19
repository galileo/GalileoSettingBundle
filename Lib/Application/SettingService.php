<?php

namespace Galileo\SettingBundle\Lib\Application;

use Galileo\SettingBundle\Lib\Model\SettingRepository;
use Galileo\SettingBundle\Lib\Model\ValueObject\Key;

class SettingService
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
}
