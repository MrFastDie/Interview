<?php

namespace MrFastDie\Interview\StateMachine\State;

class NewState extends AbstractState
{
    public const STATE_NAME = 'NEW';

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
            DuplicationFakeState::STATE_NAME,
            InReviewState::STATE_NAME,
        ];
    }

    public function setIban(?string $iban): void
    {
    }
}