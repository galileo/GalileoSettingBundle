<?php

namespace Galileo\SettingBundle\Lib\Model\ValueObject;

class Key
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public static function fromString($keyName)
    {
        return new Key($keyName);
    }

    public function key()
    {
        return $this->key;
    }
}
