<?php

namespace Galileo\SettingBundle\Lib\Model\Event;

interface EventAggregateInterface
{
    /**
     * @return EventInterface[]
     */
    public function getEvents();

    /**
     * @return void
     */
    public function cleanupEvents();
}
