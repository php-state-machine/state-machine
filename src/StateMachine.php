<?php

abstract class StateMachine
{
    /**
     * @var \StateMachine\StateDefinition
     */
    private $stateDefinition;

    function __construct()
    {
        $this->stateDefinition = $this->checkDefinition(
            $this->stateMachine(new \StateMachine\StateDefinition()));
    }

    /**
     * @param \StateMachine\StateDefinition $definition
     * @return \StateMachine\StateDefinition
     */
    private function checkDefinition(\StateMachine\StateDefinition $definition)
    {
        //TODO Replace this shit
        /** @var \StateMachine\Event $event */
        foreach($definition->getEvents() as $event) {
            /** @var \StateMachine\Transition $transition */
            foreach($event->getTransitions() as $transition) {
                $definition->state($transition->getFrom());
                $definition->state($transition->getTo());
            }
        }
        return $definition;
    }

    /**
     * @param \StateMachine\StateDefinition $definition
     * @return \StateMachine\StateDefinition
     */
    abstract protected function stateMachine(\StateMachine\StateDefinition $definition);
}