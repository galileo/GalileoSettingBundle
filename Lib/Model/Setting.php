<?php

namespace Galileo\SettingBundle\Lib\Model;

class Setting
{
    private $id;
    private $name;
    private $value;
    private $section;

    public static function issueNew($name, $value)
    {
        $setting = new Setting();
        $setting->name = $name;
        $setting->value = $value;

        return $setting;
    }

    public static function issueForSection($name, $value, $section)
    {
        $setting = self::issueNew($name, $value);
        $setting->section = $section;

        return $section;
    }

    public function name()
    {
        return $this->name;
    }

    public function value()
    {
        return $this->value;
    }

    public function section()
    {
        return $this->section;
    }
}
