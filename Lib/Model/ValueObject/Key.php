<?php

namespace Galileo\SettingBundle\Lib\Model\ValueObject;

class Key
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function key()
    {
        return $this->key;
    }
}
