<?php
namespace StateMachine;

class AfterTransitionCriteria
{
    private $from;

    private $to;

    function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }
} 