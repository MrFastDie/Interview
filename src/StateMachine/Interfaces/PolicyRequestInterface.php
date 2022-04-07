<?php

namespace MrFastDie\Interview\StateMachine\Interfaces;

interface PolicyRequestInterface
{
    public function __construct(string $state);
    public function getLeadState(): string;

    /**
     * @return string[]
     */
    public function getPossibleNextStates(): array;

    public function transitionState(string $state): bool;
}