<?php

namespace StateMachine;


class State
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    function __construct($name = null)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}