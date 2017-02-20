<?php

namespace Galileo\SettingBundle\Lib\Model\ValueObject;

class Section
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function name()
    {
        return $this->name;
    }
}
