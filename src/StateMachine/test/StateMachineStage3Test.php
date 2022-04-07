<?php

namespace MrFastDie\Interview\StateMachine\test;

use MrFastDie\Interview\StateMachine\StateMachine;
use PHPUnit\Framework\TestCase;

class StateMachineStage3Test extends TestCase
{
    private array $validIbans = [
        'DE02120300000000202051',
        'DE02500105170137075030',
        'DE02100500000054540402',
        'DE02300209000106531065',
        'DE02200505501015871393',
        'DE02100100100006820101',
        'DE02300606010002474689',
        'DE02600501010002034304',
        'DE02700202700010108669',
        'DE02700100800030876808',
        'DE02370502990000684712',
        'DE88100900001234567892',
        'DE02701500000000594937',
        'AT023600000000679514',
        'AT021700000432040976',
        'AT022050303300646365',
        'AT023225000000704957',
        'CH0209000000100013997',
        'CH0204835000626882001',
        'CH0200700110000387896',
        'CH0208401000051138778',
        'CH0200767000C51001987',
        'LI0508812105028570001',
        'LI0608808000220182703',
        'LI15088110605699K002E',
        'LI0608813201408880001',
        'LI2608802001003488101',
        'LI5708801200185100814',
    ];

    private array $invalidIbans = [
        'DE0212030000000020205113',
        'DE0250010517013707503013',
        'DE0210050000005454040213',
        'DE0230020900010653106513',
        'DE0220050550101587139313',
        'DE0210010010000682010113',
        'DE0230060601000247468913',
        'DE0260050101000203430413',
        'DE0270020270001010866913',
        'DE0270010080003087680813',
        'DE0237050299000068471213',
        'DE8810090000123456789213',
        'DE0270150000000059493713',
        'AT02360000000067951412',
        'AT02170000043204097612',
        'AT02205030330064636512',
        'AT02322500000070495712',
        'CH020900000010001399',
        'CH020483500062688200',
        'CH020070011000038789',
        'CH020840100005113877',
        'CH0200767000C5100198',
        'LI050881210502857000',
        'LI060880800022018270',
        'LI15088110605699K002',
        'LI060881320140888000',
        'LI260880200100348810',
        'LI570880120018510081',
    ];

    /**
     * @test
     * @dataProvider provideMainTransitionsWithIban
     */
    public function mainTransitionWithIBAN(string $iban, bool $valid): void
    {
        $state = new StateMachine('INCOMPLETE');
        $state->setIBAN($iban);

        self::assertEquals($valid, $state->transitionState('NEW'));
    }

    public function provideMainTransitionsWithIban(): array
    {
        return [
            'valid IBAN' => [
                'iban' => 'DE80500105175408332501',
                'valid' => true,
            ],
            'invalid IBAN' => [
                'iban' => 'DE02370100500001651503',
                'valid' => false,
            ],
        ];
    }

    /**
     * @test
     * @dataProvider provideTransitionsWithIban
     */
    public function transitionWithIBAN(string $iban, bool $valid): void
    {
        $state = new StateMachine('INCOMPLETE');
        $state->setIBAN($iban);

        self::assertEquals($valid, $state->transitionState('NEW'));
    }

    public function provideTransitionsWithIban(): array
    {
        $ret = [];

        foreach ($this->validIbans as $iban) {
            $ret[sprintf('valid IBAN %s', $iban)] = [
                'iban' => $iban,
                'valid' => true,
            ];
        }

        foreach ($this->invalidIbans as $iban) {
            $ret[sprintf('invalid IBAN %s', $iban)] = [
                'iban' => $iban,
                'valid' => false,
            ];
        }

        return $ret;
    }
}