<?php

namespace MrFastDie\Interview\StateMachine\State;

class CanceledState extends AbstractState
{
    public const STATE_NAME = 'CANCELED';

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