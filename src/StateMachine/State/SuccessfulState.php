<?php

namespace MrFastDie\Interview\StateMachine\State;

class SuccessfulState extends AbstractState
{
    public const STATE_NAME = 'SUCCESSFUL';

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
            InactiveState::STATE_NAME,
            CanceledState::STATE_NAME,
            ErrorState::STATE_NAME,
        ];
    }

    public function setIban(?string $iban): void
    {
    }
}