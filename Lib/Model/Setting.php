<?php

namespace Galileo\SettingBundle\Lib\Model;

use Galileo\SettingBundle\Lib\Model\Event\EventAggregateInterface;
use Galileo\SettingBundle\Lib\Model\Event\EventAggregateTrait;
use Galileo\SettingBundle\Lib\Model\ValueObject\Key;
use Galileo\SettingBundle\Lib\Model\ValueObject\Section;
use Galileo\SettingBundle\Lib\Model\ValueObject\Value;

class Setting implements EventAggregateInterface
{
    use EventAggregateTrait;

    private $name;
    private $value;
    private $section;

    public static function issue(Key $name, Value $value, Section $section)
    {
        return new Setting($name, $value, $section);
    }

    public function __construct(Key $key, Value $value, Section $section)
    {
        $this->setKey($key);
        $this->setValue($value);
        $this->setSection($section);
    }

    public function name()
    {
        return $this->name;
    }

    public function value()
    {
        return $this->value;
    }

    public function section()
    {
        return $this->section;
    }

    /**
     * @param Value $value
     */
    public function changeValue(Value $value)
    {
        $internalValue = new Value($this->value);

        if ($value->equalsTo($internalValue)) {
            return;
        }

        $this->setValue($value);
    }

    /**
     * @param Key $key
     */
    private function setKey(Key $key)
    {
        $this->name = $key->key();
    }

    /**
     * @param Section $section
     */
    private function setSection(Section $section)
    {
        $this->section = $section->name();
    }

    /**
     * @param Value $value
     */
    private function setValue(Value $value)
    {
        $this->value = $value->value();
    }
}
