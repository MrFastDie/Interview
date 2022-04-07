<?php

namespace MrFastDie\Interview\StateMachine\test;

use MrFastDie\Interview\StateMachine\StateMachine;
use PHPUnit\Framework\TestCase;

class StateMachineStage1Test extends TestCase
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
    public function mainLeadStateDefinitions(string $stage): void
    {
        $state = new StateMachine($stage);

        self::assertEquals($stage, $state->getLeadState());
    }

    public function provideMainLeadStateDefinitions(): array
    {
        return [
            'NEW' => [
                'stage' => 'NEW',
            ],
            'IN_REVIEW' => [
                'stage' => 'IN_REVIEW',
            ],
        ];
    }

    /**
     * @test
     */
    public function unknownState(): void
    {
        self::expectException(\Exception::class);

        new StateMachine('vajsdj0');
    }

    /**
     * @test
     * @dataProvider provideAllLeadStates
     */
    public function expectAllLeadStates(string $state): void
    {
        self::assertEquals($state, (new StateMachine($state))->getLeadState());
    }

    public function provideAllLeadStates(): array
    {
        $ret = [];

        foreach ($this->states as $state) {
            $ret[$state] = [ 'state' => $state ];
        }

        return $ret;
    }

    /**
     * @test
     * @dataProvider provideMainNextStates
     */
    public function expectMainNextStates(string $state): void
    {
        $nextStates = (new StateMachine($state))->getPossibleNextStates();
        sort($nextStates);
        $realNextStates = $this->possible_next_states[$state];
        sort($realNextStates);

        self::assertEquals($realNextStates, $nextStates);
    }

    public function provideMainNextStates(): array
    {
        return [
            'INCOMPLETE' => [
                'state' => 'INCOMPLETE'
            ],
            'NEW' => [
                'state' => 'NEW'
            ],
            'IN_REVIEW' => [
                'state' => 'IN_REVIEW'
            ],
        ];
    }

    /**
     * @test
     * @dataProvider provideAllLeadStates
     */
    public function expectAllNextStates(string $state): void
    {
        $nextStates = (new StateMachine($state))->getPossibleNextStates();
        sort($nextStates);
        $realNextStates = $this->possible_next_states[$state];
        sort($realNextStates);

        self::assertEquals($realNextStates, $nextStates);
    }
}