<?php

namespace Galileo\SettingBundle\Lib\Model\Event;

trait EventAggregateTrait
{
    private $events = [];

    protected function riseEvent(EventInterface $event)
    {
        $this->events[] = $event;
    }

    /**
     * @return EventInterface[]
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
