<?php

namespace Galileo\SettingBundle\Lib\Model\ValueObject;

use Galileo\SettingBundle\Lib\Model\Setting;

class SettingValueChooser
{
    private $value;

    public static function choose(Setting $setting = null, $default = null)
    {
        return new SettingValueChooser($setting ? $setting->value() : $default);
    }

    private function __construct($value)
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }
}
