<?php

namespace Galileo\SettingBundle\Lib\Model;

use Galileo\SettingBundle\Lib\Model\ValueObject\Key;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;

interface SettingRepository
{
    /**
     * @param Key $settingKey
     * @return Setting | null
     */
    public function findFor(Key $settingKey);

    /**
     * @param Key $settingKey
     * @param Section $settingSection
     *
     * @return Setting | null
     */
    public function findWithinSection(Key $settingKey, Section $settingSection);
}
