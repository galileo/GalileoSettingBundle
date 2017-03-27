<?php

namespace Galileo\SettingBundle\Lib\Model\ValueObject;

use Galileo\SettingBundle\Lib\Model\Setting;

class SettingValueChooser
{
    private $value;

    public static function choose(Setting $setting = null, $default = null)
    {
        return new SettingValueChooser($setting, $default);
    }

    private function __construct(Setting $setting, $default = null)
    {
        $this->value = $setting ? $setting->value() : $default;
    }

    public function value()
    {
        return $this->value;
    }
}
