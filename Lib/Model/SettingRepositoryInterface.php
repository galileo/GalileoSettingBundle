<?php

namespace Galileo\SettingBundle\Lib\Model;

use Galileo\SettingBundle\Lib\Model\ValueObject\Key;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;

interface SettingRepositoryInterface
{
    /**
     * @param Key $settingKey
     * @param Section $settingSection
     *
     * @return Setting | null
     */
    public function findWithinSection(Key $settingKey, Section $settingSection);

    /**
     * @param Setting $setting
     *
     * @return Setting
     */
    public function save(Setting $setting);
}
