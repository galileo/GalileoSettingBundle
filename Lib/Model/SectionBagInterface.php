<?php

namespace Galileo\SettingBundle\Lib\Model;

interface SectionBagInterface extends SettingBagInterface
{
    /**
     * @param string $sectionName
     *
     * @return SettingBagInterface
     */
    public function section($sectionName);
}
