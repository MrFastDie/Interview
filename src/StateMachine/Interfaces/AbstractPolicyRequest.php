<?php

namespace MrFastDie\Interview\StateMachine\Interfaces;

abstract class AbstractPolicyRequest implements PolicyRequestInterface
{
    private string $iban;

    abstract public function __construct(string $state);
    abstract public function getLeadState(): string;

    /**
     * @return string[]
     */
    abstract public function getPossibleNextStates(): array;

    abstract public function transitionState(string $state): bool;

    public function setIBAN(string $iban): void
    {
        $this->iban = $iban;
    }

    public function getIBAN(): string
    {
        return $this->iban;
    }
}