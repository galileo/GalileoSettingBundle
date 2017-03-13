<?php

namespace Galileo\SettingBundle\Lib\Model;

use Galileo\SettingBundle\Lib\Model\ValueObject\Key;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;
use Galileo\SettingBundle\Lib\Model\ValueObject\SettingValueChooser;
use Galileo\SettingBundle\Lib\Model\ValueObject\Value;

class SectionQuery
{
    /**
     * @var SettingRepository
     */
    private $settingRepository;

    /**
     * @var Section
     */
    private $section;

    public function __construct(SettingRepository $settingRepository, Section $section)
    {
        $this->settingRepository = $settingRepository;
        $this->section = $section;
    }

    public function get($key, $default = null)
    {
        $chooseValue = SettingValueChooser::choose($this->find(new Key($key)), $default);

        return $chooseValue->value();
    }

    public function set($key, $value)
    {
        $aKey = Key::fromString($key);
        $aValue = Value::fromString($value);

        $setting = $this->find($aKey);

        if (null == $setting) {
            $setting = Setting::issueForSection($aKey, $aValue, $this->section);
        }

        $setting->changeValue($aValue);

        $this->settingRepository->save($setting);
    }

    /**
     * @param Key $key
     * @return Setting|null
     */
    private function find(Key $key)
    {
        return $this->settingRepository->findWithinSection($key, $this->section);
    }
}
