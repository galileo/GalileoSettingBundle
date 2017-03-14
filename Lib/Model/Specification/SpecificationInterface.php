<?php

namespace Galileo\SettingBundle\Lib\Model\Specification;

use Galileo\SettingBundle\Lib\Model\Exceptions\GuardException;

interface SpecificationInterface
{
    /**
     * @param mixed $value
     *
     * @return void
     * @throws GuardException
     */
    public function guard($value);

    /**
     * @param mixed $value
     *
     * @return boolean
     */
    public function satisfiedBy($value);
}
