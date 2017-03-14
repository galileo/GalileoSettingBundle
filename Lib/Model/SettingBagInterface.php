<?php

namespace Galileo\SettingBundle\Lib\Model;

interface SettingBagInterface
{
    /**
     * @param string $name
     * @param string|integer|boolean|null $default
     *
     * @return string
     *
     * @throws ValueCanNotBeAnObjectException When you add as $default object that can not be converted to string
     * @throws
     */
    public function get($name, $default = null);

    /**
     * @param string $name
     * @param string|integer|boolean|null $value
     *
     * @return void
     */
    public function set($name, $value);
}