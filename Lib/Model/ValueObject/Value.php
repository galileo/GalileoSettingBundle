<?php

namespace Galileo\SettingBundle\Lib\Model\ValueObject;

class Value
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    function value()
    {
        return $this->value;
    }
}
