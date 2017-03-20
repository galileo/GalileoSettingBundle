<?php

namespace Galileo\SettingBundle\Lib\Application;

use Galileo\SettingBundle\Lib\Model\SectionBagInterface;
use Galileo\SettingBundle\Lib\Model\SectionQuery;
use Galileo\SettingBundle\Lib\Model\SettingRepositoryInterface;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;

class SettingApplication implements SectionBagInterface
{
    private $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function get($settingKey, $defaultValue = null)
    {
        $sectionQuery = new SectionQuery($this->settingRepository, Section::blank());

        return $sectionQuery->get($settingKey, $defaultValue);
    }

    /**
     * {@inheritdoc}
     */
    public function section($name)
    {
        return new SectionQuery($this->settingRepository, new Section($name));
    }

    /**
     * {@inheritdoc}
     */
    public function set($keyName, $valueString)
    {
        $sectionQuery = new SectionQuery($this->settingRepository, Section::blank());
        $sectionQuery->set($keyName, $valueString);
    }
}
