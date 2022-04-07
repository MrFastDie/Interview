<?php

namespace MrFastDie\Interview\StateMachine\State;

abstract class AbstractState
{
    abstract public function getStateName(): string;

    /**
     * @return string[]
     */
    abstract public function getPossibleTransitions(): array;

    abstract public function setIban(?string $iban): void;

    public function canTransitionTo(string $toStateName): bool
    {
        return in_array($toStateName, $this->getPossibleTransitions());
    }
}