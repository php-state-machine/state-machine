<?php

namespace StateMachine;

class StateDefinition
{
    /**
     * @var array<State>
     */
    private $states;

    /**
     * @var array<Event>
     */
    private $events;

    /**
     * @var array<Command>
     */
    private $commands;

    /**
     * @var State
     */
    private $initialState;

    /**
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @return array
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * @param string $initialStateName
     */
    public function setInitialState($initialStateName)
    {
        $this->initialState = $this->state($initialStateName);
    }

    /**
     * @return \StateMachine\State
     */
    public function getInitialState()
    {
        return $this->initialState;
    }

    /**
     * @param string $stateName
     * @return State
     */
    public function state($stateName)
    {
        if (!isset($this->states [$stateName])) {
            $state = new State($stateName);
            $this->states [$stateName] = $state;
        }
        return $this->states [$stateName];
    }

    /**
     * @param string $eventName
     * @return Event
     */
    public function event($eventName)
    {
        if (!isset($this->events [$eventName])) {
            $event = new Event($eventName);
            $this->events [$eventName] = $event;
        }
        return $this->events [$eventName];
    }

    /**
     * @param string $from
     * @param string $to
     * @param array $commands
     *
     * @return $this
     */
    public function afterTransition($from, $to, array $commands)
    {
        foreach ($commands as $command) {
            $smCommand = new Command();
            $smCommand->setCriteria(new AfterTransitionCriteria($from, $to));
            $smCommand->setCommand($command);
            $this->commands [] = $smCommand;
        }
        return $this;
    }

    /**
     * @param string $from
     * @param string $to
     * @param array $commands
     *
     * @return $this
     */
    public function beforeTransition($from, $to, array $commands)
    {
        foreach ($commands as $command) {
            $smCommand = new Command();
            $smCommand->setCriteria(new BeforeTransitionCriteria($from, $to));
            $smCommand->setCommand($command);
            $this->commands [] = $smCommand;
        }
        return $this;
    }

    /**
     * @param $stateName
     * @return null|State
     */
    public function getStateByName($stateName)
    {
        /** @var \StateMachine\State $state */
        foreach ($this->states as $state) {
            if ($state->getName() == $stateName) {
                return $state;
            }
        }
        return null;
    }

    /**
     * @param $stateName
     * @return bool
     */
    public function hasState($stateName)
    {
        return $this->getStateByName($stateName) ? true : false;
    }

    /**
     * @param $eventName
     * @return null|\StateMachine\Transition
     */
    public function getTransitionByEventName($eventName)
    {
        /** @var \StateMachine\State $state */
        foreach ($this->getStates() as $state) {
            /** @var \StateMachine\Transition $transition */
            foreach ($state->getTransitions() as $transition) {
                if ($transition->getEvent() == $eventName) {
                    return $transition;
                }
            }
        }
        return null;
    }
}