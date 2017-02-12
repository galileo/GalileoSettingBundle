<?php

namespace Galileo\SettingBundle\Features\Context;

use Behat\Behat\Context\Context;
use Galileo\SettingBundle\Features\Context\Features\GetSettingContext;

class FeatureContext implements Context
{
    use GetSettingContext;
}
