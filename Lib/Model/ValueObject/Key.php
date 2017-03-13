<?php

namespace Galileo\SettingBundle\Lib\Model\ValueObject;

use Galileo\SettingBundle\Lib\Model\Exceptions\GuardException;
use Galileo\SettingBundle\Lib\Model\Specification\AlphaNumericSpecification;

class Key
{
    private $key;

    /**
     * @throws GuardException
     */
    public function __construct($key)
    {
        $this->guard($key);
        $this->setKey($key);
    }

    public static function fromString($keyName)
    {
        return new Key($keyName);
    }

    public function key()
    {
        return $this->key;
    }

    /**
     * @param $key
     */
    private function guard($key)
    {
        $alphaNumericSpecification = new AlphaNumericSpecification();
        $alphaNumericSpecification->guard($key);
    }

    /**
     * @param $key
     */
    private function setKey($key)
    {
        $this->key = $key;
    }
}
