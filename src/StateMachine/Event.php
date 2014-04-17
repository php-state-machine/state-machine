<?php

namespace StateMachine;

class Event
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $transitions;

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getTransitions()
    {
        return $this->transitions;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $from
     * @param string $to
     * @param $condition
     * @return $this
     */
    public function transition($from, $to, $condition)
    {
        $transition = new Transition($from, $to);
        $transition->setCondition($condition);
        $this->transitions [] = $transition;
        return $this;
    }
}