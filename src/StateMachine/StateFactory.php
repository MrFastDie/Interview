<?php

namespace MrFastDie\Interview\StateMachine;

use MrFastDie\Interview\StateMachine\State\AbstractState;
use MrFastDie\Interview\StateMachine\State\CanceledState;
use MrFastDie\Interview\StateMachine\State\DuplicationFakeState;
use MrFastDie\Interview\StateMachine\State\ErrorState;
use MrFastDie\Interview\StateMachine\State\InactiveState;
use MrFastDie\Interview\StateMachine\State\IncompleteState;
use MrFastDie\Interview\StateMachine\State\InReviewState;
use MrFastDie\Interview\StateMachine\State\NewState;
use MrFastDie\Interview\StateMachine\State\NotSuccessfulState;
use MrFastDie\Interview\StateMachine\State\ReadyForTransmissionState;
use MrFastDie\Interview\StateMachine\State\SuccessfulState;
use MrFastDie\Interview\StateMachine\State\TransmittedState;

class StateFactory
{
    /**
     * @throws \Exception
     */
    public function generateState(string $state): AbstractState
    {
        switch ($state) {
            case ErrorState::STATE_NAME:
                return new ErrorState();
            case IncompleteState::STATE_NAME:
                return new IncompleteState();
            case NewState::STATE_NAME:
                return new NewState();
            case InReviewState::STATE_NAME:
                return new InReviewState();
            case DuplicationFakeState::STATE_NAME:
                return new DuplicationFakeState();
            case ReadyForTransmissionState::STATE_NAME:
                return new ReadyForTransmissionState();
            case TransmittedState::STATE_NAME:
                return new TransmittedState();
            case SuccessfulState::STATE_NAME:
                return new SuccessfulState();
            case InactiveState::STATE_NAME:
                return new InactiveState();
            case CanceledState::STATE_NAME:
                return new CanceledState();
            case NotSuccessfulState::STATE_NAME:
                return new NotSuccessfulState();
            default:
                throw new \Exception(sprintf('%s is an unknown state', $state));
        }
    }
}