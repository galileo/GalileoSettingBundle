<?php

namespace Galileo\SettingBundle\Lib\Model\Event;

trait EventAggregateTrait
{
    private $events = [];

    protected function riseEvent(Event $event)
    {
        $this->events[] = $event;
    }

    /**
     * @return Event[]
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @return void
     */
    public function cleanupEvents()
    {
        $this->events = [];
    }
}
