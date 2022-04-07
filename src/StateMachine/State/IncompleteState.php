<?php

namespace MrFastDie\Interview\StateMachine\State;

use MrFastDie\Interview\StateMachine\Helper\CheckIBAN;

class IncompleteState extends AbstractState
{
    public const STATE_NAME = 'INCOMPLETE';
    private ?string $iban;

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
            NewState::STATE_NAME,
        ];
    }

    public function setIban(?string $iban): void
    {
        $this->iban = $iban;
    }

    public function canTransitionTo(string $to): bool {
        if (
            !(new CheckIBAN())->checkIban($this->iban)
        ) {
            return false;
        }

        return parent::canTransitionTo($to);
    }
}