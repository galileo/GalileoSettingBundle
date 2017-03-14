<?php

namespace Galileo\SettingBundle\Lib\Infrastructure\Framework;

use Galileo\SettingBundle\Lib\Model\Setting;
use Galileo\SettingBundle\Lib\Model\SettingRepositoryInterface;
use Galileo\SettingBundle\Lib\Model\ValueObject\Key;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;

class DoctrineSettingRepository implements SettingRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function findWithinSection(Key $settingKey, Section $settingSection)
    {
        // TODO: Implement findWithinSection() method.
    }

    /**
     * {@inheritdoc}
     */
    public function save(Setting $setting)
    {
        // TODO: Implement save() method.
    }
}
