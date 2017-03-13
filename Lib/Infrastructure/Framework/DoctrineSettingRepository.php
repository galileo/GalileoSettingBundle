<?php

namespace Galileo\SettingBundle\Lib\Infrastructure\Framework;

use Galileo\SettingBundle\Lib\Model\Setting;
use Galileo\SettingBundle\Lib\Model\SettingRepository;
use Galileo\SettingBundle\Lib\Model\ValueObject\Key;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;

class DoctrineSettingRepository implements SettingRepository
{
    public function findFor(Key $settingKey)
    {
        // TODO: Implement findFor() method.
    }

    /**
     * @param Key $settingKey
     * @param Section $settingSection
     *
     * @return Setting | null
     */
    public function findWithinSection(Key $settingKey, Section $settingSection)
    {
        // TODO: Implement findWithinSection() method.
    }

    /**
     * @param Setting $setting
     *
     * @return Setting
     */
    public function save(Setting $setting)
    {
        // TODO: Implement save() method.
    }
}
