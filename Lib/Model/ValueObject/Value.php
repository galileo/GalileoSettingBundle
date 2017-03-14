<?php

namespace Galileo\SettingBundle\Lib\Model\ValueObject;

class Value
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function fromString($string)
    {
        return new Value($string);
    }

    public function value()
    {
        return $this->value;
    }

    public function equalsTo(Value $value)
    {
        return $this->value === $value->value;
    }
}
