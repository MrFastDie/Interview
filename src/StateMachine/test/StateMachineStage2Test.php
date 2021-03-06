<?php

namespace MrFastDie\Interview\StateMachine\test;

use MrFastDie\Interview\StateMachine\StateMachine;
use PHPUnit\Framework\TestCase;

class StateMachineStage2Test extends TestCase
{
    private array $states = [
        'INCOMPLETE',
        'NEW',
        'IN_REVIEW',
        'DUPLICATE_FAKE',
        'READY_FOR_TRANSMISSION',
        'TRANSMITTED',
        'SUCCESSFUL',
        'INACTIVE',
        'CANCELED',
        'NOT_SUCCESSFUL',
        'ERROR'
    ];

    private array $possible_next_states = [
        'INCOMPLETE' => ['DUPLICATE_FAKE', 'NEW', 'ERROR'],
        'NEW' => ['IN_REVIEW', 'DUPLICATE_FAKE', 'ERROR'],
        'DUPLICATE_FAKE' => [],
        'IN_REVIEW' => ['DUPLICATE_FAKE', 'READY_FOR_TRANSMISSION', 'ERROR'],
        'READY_FOR_TRANSMISSION' => ['TRANSMITTED', 'ERROR'],
        'TRANSMITTED' => ['SUCCESSFUL', 'NOT_SUCCESSFUL', 'ERROR'],
        'SUCCESSFUL' => ['INACTIVE', 'CANCELED', 'ERROR'],
        'INACTIVE' => ['ERROR'],
        'CANCELED' => ['ERROR'],
        'NOT_SUCCESSFUL' => ['ERROR'],
        'ERROR' => [],
    ];

    /**
     * @test
     * @dataProvider provideMainLeadStateDefinitions
     */
    public function mainTransitionState(string $currentState, string $transitionTo, bool $allowedTransition): void
    {
        $state = new StateMachine($currentState);
        $state->setIBAN('DE80500105175408332501');

        self::assertEquals($allowedTransition, $state->transitionState($transitionTo));
    }

    public function provideMainLeadStateDefinitions(): array
    {
        return [
            'NEW TO IN_REVIEW' => [
                'currentState' => 'NEW',
                'transitionTo' => 'IN_REVIEW',
                'allowedTransition' => true,
            ],
            'NEW TO NEW' => [
                'currentState' => 'NEW',
                'transitionTo' => 'NEW',
                'allowedTransition' => false,
            ],
        ];
    }

    /**
     * @test
     * @dataProvider provideAllTransitions
     */
    public function allTransitionState(string $currentState, string $transitionTo, bool $allowedTransition): void
    {
        $state = new StateMachine($currentState);
        $state->setIBAN('DE80500105175408332501');

        self::assertEquals($allowedTransition, $state->transitionState($transitionTo));
    }

    public function provideAllTransitions(): array
    {
        $ret = [];


        foreach ($this->states as $left) {
            foreach ($this->states as $right) {
                $ret[sprintf("%s to %s", $left, $right)] = [
                    'currentState' => $left,
                    'transitionTo' => $right,
                    'allowedTransition' => in_array($right, $this->possible_next_states[$left]),
                ];
            }
        }

        return $ret;
    }
}