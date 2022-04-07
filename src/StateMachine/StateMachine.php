<?php

namespace MrFastDie\Interview\StateMachine;

use MrFastDie\Interview\StateMachine\Interfaces\AbstractPolicyRequest;
use MrFastDie\Interview\StateMachine\Interfaces\PolicyRequestInterface;
use MrFastDie\Interview\StateMachine\State\AbstractState;

class StateMachine extends AbstractPolicyRequest implements PolicyRequestInterface
{
    private AbstractState $state;
    private StateFactory $stateFactory;

    /**
     * @throws \Exception
     */
    public function __construct(string $state)
    {
        $this->stateFactory = new StateFactory();
        $this->state = $this->stateFactory->generateState($state);
    }

    public function getLeadState(): string
    {
        return $this->state->getStateName();
    }

    public function getPossibleNextStates(): array
    {
        return $this->state->getPossibleTransitions();
    }

    /**
     * @throws \Exception
     */
    public function transitionState(string $to): bool
    {
        $this->state->setIban($this->getIBAN() ?: null);

        $canTransition = $this->state->canTransitionTo($to);

        if ($canTransition) {
            $this->state = $this->stateFactory->generateState($to);
        }

        return $canTransition;
    }
}