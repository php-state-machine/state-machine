<?php

namespace StateMachine;


class Transition
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @var array
     */
    private $commands = array();

    /**
     * @var string
     */
    private $event;

    /**
     * @var string
     */
    private $condition;

    /**
     * @param string $from
     * @param string $to
     */
    function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @param string $condition
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
    }

    /**
     * @return string
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param array $commands
     */
    public function setCommands($commands)
    {
        $this->commands = $commands;
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * @param string $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param $command
     */
    public function addCommand($command)
    {
        $this->commands [] = $command;
    }
}