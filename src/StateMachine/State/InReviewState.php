<?php

namespace MrFastDie\Interview\StateMachine\State;

class InReviewState extends AbstractState
{
    public const STATE_NAME = 'IN_REVIEW';

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
            DuplicationFakeState::STATE_NAME,
            ReadyForTransmissionState::STATE_NAME,
            ErrorState::STATE_NAME,
        ];
    }

    public function setIban(?string $iban): void
    {
    }
}