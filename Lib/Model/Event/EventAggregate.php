<?php

namespace Galileo\SettingBundle\Lib\Model\Event;

interface EventAggregate
{
    /**
     * @return Event[]
     */
    public function getEvents();

    /**
     * @return void
     */
    public function cleanupEvents();
}
