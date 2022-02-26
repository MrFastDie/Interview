<?php

namespace MrFastDie\Interview\FizzBuzz\test;

use MrFastDie\Interview\FizzBuzz\FizzBuzz;
use PHPUnit\Framework\TestCase;

/**
 * This is the test implementation of FizzBuzz
 * Those are the rules:
 *
 * If an input is dividable by 3 you output Fizz
 * If an input is dividable by 5 you output Bazz
 * If it's dividable by 3 and 5 you output FizzBazz
 * If none of the above ones are correct you output the input as string
 */
class FizzBuzzTest extends TestCase
{
    private FizzBuzz $example;

    public function setUp(): void
    {
        parent::setUp();

        $this->example = new FizzBuzz();
    }

    /**
     * @Test
     * @dataProvider provideFizzBuzz
     */
    public function testFizzBuzz(int $input, string $output): void
    {
        self::assertEquals($output, $this->example->test($input));
    }

    public function provideFizzBuzz(): array
    {
        return [
            '1' => [1, '1'],
            '2' => [2, '2'],
            '3' => [3, 'Fizz'],
            '4' => [4, '4'],
            '5' => [5, 'Buzz'],
            '6' => [6, 'Fizz'],
            '7' => [7, '7'],
            '8' => [8, '8'],
            '9' => [9, 'Fizz'],
            '10' => [10, 'Buzz'],
            '11' => [11, '11'],
            '12' => [12, 'Fizz'],
            '13' => [13, '13'],
            '14' => [14, '14'],
            '15' => [15, 'FizzBuzz'],
            '16' => [16, '16'],
            '17' => [17, '17'],
            '18' => [18, 'Fizz'],
            '19' => [19, '19'],
            '20' => [20, 'Buzz'],
            '21' => [21, 'Fizz'],
            '22' => [22, '22'],
            '23' => [23, '23'],
            '24' => [24, 'Fizz'],
            '25' => [25, 'Buzz'],
            '26' => [26, '26'],
            '27' => [27, 'Fizz'],
            '28' => [28, '28'],
            '29' => [29, '29'],
            '30' => [30, 'FizzBuzz'],
            '31' => [31, '31'],
            '32' => [32, '32'],
            '33' => [33, 'Fizz'],
            '34' => [34, '34'],
            '35' => [35, 'Buzz'],
            '36' => [36, 'Fizz'],
            '37' => [37, '37'],
            '38' => [38, '38'],
            '39' => [39, 'Fizz'],
            '40' => [40, 'Buzz'],
            '41' => [41, '41'],
            '42' => [42, 'Fizz'],
            '43' => [43, '43'],
            '44' => [44, '44'],
            '45' => [45, 'FizzBuzz'],
            '46' => [46, '46'],
            '47' => [47, '47'],
            '48' => [48, 'Fizz'],
            '49' => [49, '49'],
            '50' => [50, 'Buzz'],
            '51' => [51, 'Fizz'],
            '52' => [52, '52'],
            '53' => [53, '53'],
            '54' => [54, 'Fizz'],
            '55' => [55, 'Buzz'],
            '56' => [56, '56'],
            '57' => [57, 'Fizz'],
            '58' => [58, '58'],
            '59' => [59, '59'],
            '60' => [60, 'FizzBuzz'],
            '61' => [61, '61'],
            '62' => [62, '62'],
            '63' => [63, 'Fizz'],
            '64' => [64, '64'],
            '65' => [65, 'Buzz'],
            '66' => [66, 'Fizz'],
            '67' => [67, '67'],
            '68' => [68, '68'],
            '69' => [69, 'Fizz'],
            '70' => [70, 'Buzz'],
            '71' => [71, '71'],
            '72' => [72, 'Fizz'],
            '73' => [73, '73'],
            '74' => [74, '74'],
            '75' => [75, 'FizzBuzz'],
            '76' => [76, '76'],
            '77' => [77, '77'],
            '78' => [78, 'Fizz'],
            '79' => [79, '79'],
            '80' => [80, 'Buzz'],
            '81' => [81, 'Fizz'],
            '82' => [82, '82'],
            '83' => [83, '83'],
            '84' => [84, 'Fizz'],
            '85' => [85, 'Buzz'],
            '86' => [86, '86'],
            '87' => [87, 'Fizz'],
            '88' => [88, '88'],
            '89' => [89, '89'],
            '90' => [90, 'FizzBuzz'],
            '91' => [91, '91'],
            '92' => [92, '92'],
            '93' => [93, 'Fizz'],
            '94' => [94, '94'],
            '95' => [95, 'Buzz'],
            '96' => [96, 'Fizz'],
            '97' => [97, '97'],
            '98' => [98, '98'],
            '99' => [99, 'Fizz'],
            '100' => [100, 'Buzz'],
        ];
    }
}