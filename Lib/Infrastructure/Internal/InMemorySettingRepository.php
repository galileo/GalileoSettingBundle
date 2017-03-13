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
            $section = $key[2];
            $value = $key[1];
            $this->set($value, $name, $section);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function findFor(Key $settingKey)
    {
        if (!isset($this->values[$settingKey->key()][Section::EMPTY_SECTION])) {
            return null;
        }

        return Setting::issueNew($settingKey, $this->values[$settingKey->key()][Section::EMPTY_SECTION]);
    }

    /**
     * {@inheritdoc}
     */
    public function findWithinSection(Key $settingKey, Section $section)
    {
        // TODO: Implement findWithinSection() method.
    }

    /**
     * {@inheritdoc}
     */
    public function save(Setting $setting)
    {
        $this->set($setting->value(), $setting->name(), $setting->section());
    }

    /**
     * @param $value
     * @param $name
     * @param $section
     */
    private function set($value, $name, $section)
    {
        $section = $section ? $section : Section::EMPTY_SECTION;

        $this->values[$name][$section] = new Value($value);
    }
}
