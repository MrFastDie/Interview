<?php

namespace MrFastDie\Interview\FizzBuzz;

class FizzBuzz
{
    public function test(int $input): string {
        $mod_3 = $input % 3 === 0;
        $mod_5 = $input % 5 === 0;
        $out = '';

        if (!($mod_3 || $mod_5)) {
            $out = $input;
        }

        if ($mod_3) {
            $out .= 'Fizz';
        }

        if ($mod_5) {
            $out .= 'Buzz';
        }

        return $out;
    }
}