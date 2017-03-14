<?php

namespace Galileo\SettingBundle\Lib\Model\Specification;

use Galileo\SettingBundle\Lib\Model\Exceptions\GuardException;

class AlphaNumericSpecification implements SpecificationInterface
{
    /**
     * {@inheritdoc}
     */
    public function guard($value)
    {
        if (!$this->satisfiedBy($value)) {
            throw new GuardException('Only alphanumeric values are accepted');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function satisfiedBy($value)
    {
        return !is_object($value) && preg_match('#\w+#', $value);
    }
}
