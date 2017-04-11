<?php

namespace Galileo\SettingBundle\Features\Context;

use Behat\Behat\Context\Context;
use Galileo\SettingBundle\Lib\Application\SettingApplication;

class DoctrineContext implements Context
{
    public function __construct(SettingApplication $application)
    {
    }
}