<?php

namespace Galileo\SettingBundle\Lib\Infrastructure\Internal;

use Galileo\SettingBundle\Lib\Model\Section;
use Galileo\SettingBundle\Lib\Model\Setting;
use Galileo\SettingBundle\Lib\Model\SettingRepository;
use Galileo\SettingBundle\Lib\Model\ValueObject\Key;

class InMemorySettingRepository implements SettingRepository
{

    /**
     * @param Key $settingKey
     * @return Setting | null
     */
    public function findFor(Key $settingKey)
    {
        // TODO: Implement findFor() method.
    }

    public function findWithinSection(Key $settingKey, Section $settingSection)
    {
        // TODO: Implement findWithinSection() method.
    }
}
