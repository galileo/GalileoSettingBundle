<?php

namespace Galileo\SettingBundle\Entity;

use Galileo\SettingBundle\Lib\Model\Setting as ModelSetting;

/**
 * Entity class created only to be able generate doctrine entity within Symfony framework without any additional
 * mapping configuration in config.yml file

 */
class Setting extends ModelSetting
{
    protected $id;
}
