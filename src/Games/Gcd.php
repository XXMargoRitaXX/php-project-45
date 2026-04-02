<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\runGame;

const MAX_RANDOM_INT = 100;
const MIN_INT_FOR_GCD = 1;
const RULES = 'Find the greatest common divisor of given numbers.';

function run(): void
{
    $generateGameDataFunc = function (): array {
        $number1 = rand(MIN_INT_FOR_GCD, MAX_RANDOM_INT);
        $number2 = rand(MIN_INT_FOR_GCD, MAX_RANDOM_INT);

        $question = "{$number1} {$number2}";
        $correctAnswer = getGcd($number1, $number2);

        return [$question, $correctAnswer];
    };

    runGame(RULES, $generateGameDataFunc);
}

function getGcd(int $number1, int $number2): int
{
    $num1 = $number1;
    $num2 = $number2;

    while ($num1 !== 0 && $num2 !== 0) {
        if ($num1 >= $num2) {
            $num1 %= $num2;
        } else {
            $num2 %= $num1;
        }
    }

    return $num1 + $num2;
}
