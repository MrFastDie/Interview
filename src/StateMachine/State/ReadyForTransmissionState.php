<?php

namespace MrFastDie\Interview\StateMachine\State;

class ReadyForTransmissionState extends AbstractState
{
    public const STATE_NAME = 'READY_FOR_TRANSMISSION';

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
            TransmittedState::STATE_NAME,
            ErrorState::STATE_NAME,
        ];
    }

    public function setIban(?string $iban): void
    {
    }
}