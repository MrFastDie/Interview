<?php

namespace MrFastDie\Interview\StateMachine\State;

class DuplicationFakeState extends AbstractState
{
    public const STATE_NAME = 'DUPLICATE_FAKE';

    public function getStateName(): string
    {
        return self::STATE_NAME;
    }

    /**
     * @inheritDoc
     */
    public function getPossibleTransitions(): array
    {
        return [];
    }

    public function setIban(?string $iban): void
    {
    }
}