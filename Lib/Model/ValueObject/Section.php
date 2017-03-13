<?php

namespace Galileo\SettingBundle\Lib\Model\ValueObject;

class Section
{
    const EMPTY_SECTION = '___empty_section___';

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function blank()
    {
        return new Section(Section::EMPTY_SECTION);
    }

    public function name()
    {
        return $this->name;
    }
}
