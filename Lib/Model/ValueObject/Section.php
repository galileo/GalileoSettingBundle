<?php

namespace Galileo\SettingBundle\Lib\Model\ValueObject;

use Galileo\SettingBundle\Lib\Model\Exceptions\GuardException;
use Galileo\SettingBundle\Lib\Model\Specification\AlphaNumericSpecification;

class Section
{
    const EMPTY_SECTION = '___empty_section___';

    private $name;

    /**
     * @param string $name
     *
     * @throws GuardException
     */
    public function __construct($name)
    {
        $this->guard($name);
        $this->setName($name);
    }

    public static function blank()
    {
        return new Section(Section::EMPTY_SECTION);
    }

    public function name()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    private function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param $name
     */
    private function guard($name)
    {
        $alphaNumericSpecification = new AlphaNumericSpecification();
        $alphaNumericSpecification->guard($name);
    }
}
