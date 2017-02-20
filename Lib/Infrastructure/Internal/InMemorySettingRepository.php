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
            $this->values[$key[0]][(string)$key[2]] = new Value($key[1]);
        }
    }

    /**
     * @param Key $settingKey
     * @return Setting | null
     */
    public function findFor(Key $settingKey)
    {
        if (!isset($this->values[$settingKey->key()]['null'])) {
            return null;
        }

        return Setting::issueNew($settingKey, $this->values[$settingKey->key()]['null']);
    }

    /**
     * @param Key $settingKey
     * @param Section $section
     *
     * @return Setting | null
     */
    public function findWithinSection(Key $settingKey, Section $section)
    {
        // TODO: Implement findWithinSection() method.
    }
}
