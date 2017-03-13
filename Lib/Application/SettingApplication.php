<?php

namespace Galileo\SettingBundle\Lib\Application;

use Galileo\SettingBundle\Lib\Model\SectionQuery;
use Galileo\SettingBundle\Lib\Model\SettingRepository;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;

class SettingApplication
{
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function get($settingKey, $defaultValue = null)
    {
        $sectionQuery = new SectionQuery($this->settingRepository, Section::blank());

        return $sectionQuery->get($settingKey, $defaultValue);
    }

    /**
     * @param $name
     * @return SectionQuery
     */
    public function section($name)
    {
        return new SectionQuery($this->settingRepository, new Section($name));
    }

    public function set($keyName, $valueString)
    {
        $sectionQuery = new SectionQuery($this->settingRepository, Section::blank());
        $sectionQuery->set($keyName, $valueString);
    }
}
