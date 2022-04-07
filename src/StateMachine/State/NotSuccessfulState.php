<?php

namespace MrFastDie\Interview\StateMachine\State;

class NotSuccessfulState extends AbstractState
{
    public const STATE_NAME = 'NOT_SUCCESSFUL';

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