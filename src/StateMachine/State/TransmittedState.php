<?php

namespace MrFastDie\Interview\StateMachine\State;

class TransmittedState extends AbstractState
{
    public const STATE_NAME = 'TRANSMITTED';

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
            SuccessfulState::STATE_NAME,
            NotSuccessfulState::STATE_NAME,
            ErrorState::STATE_NAME,
        ];
    }

    public function setIban(?string $iban): void
    {
    }
}