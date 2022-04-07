<?php

namespace MrFastDie\Interview\StateMachine\State;

class InactiveState extends AbstractState
{
    public const STATE_NAME = 'INACTIVE';

    public function getStateName(): string
    {
        return self::STATE_NAME;
    }

    /**
     * @inheritDoc
     */
    public function getPossibleTransitions(): array
    {
        return [
            ErrorState::STATE_NAME,
        ];
    }

    public function setIban(?string $iban): void
    {
    }
}