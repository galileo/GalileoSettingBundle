<?php

namespace Galileo\SettingBundle\Lib\Infrastructure\Internal;

use Galileo\SettingBundle\Lib\Model\Setting;
use Galileo\SettingBundle\Lib\Model\SettingRepository;
use Galileo\SettingBundle\Lib\Model\ValueObject\Key;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;
use Galileo\SettingBundle\Lib\Model\ValueObject\Value;

class InMemorySettingRepository implements SettingRepository
{
    private $values = [];


    public function __construct($settingPlainRows)
    {
        foreach ($settingPlainRows as $key) {
            $name = $key[0];
            $value = $key[1];
            $section = $key[2];
            $this->set($name, $value, $section);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function findWithinSection(Key $settingKey, Section $section)
    {
        $sectionName = $section->name();

        if (!$this->values) {
            return null;
        }

        $key = $settingKey->key();

        if (!isset($this->values[$key][$sectionName])) {
            return null;
        }

        return Setting::issue(
            $settingKey,
            $this->values[$key][$sectionName],
            new Section($sectionName)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function save(Setting $setting)
    {
        $this->set($setting->name(), $setting->value(), $setting->section());
    }

    /**
     * @param $name
     * @param $value
     * @param $section
     */
    private function set($name, $value, $section)
    {
        $section = $section ? $section : Section::EMPTY_SECTION;

        $this->values[$name][$section] = new Value($value);
    }
}
