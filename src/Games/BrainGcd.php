<?php

namespace BrainGames\BrainGcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\MAX_RANDOM_INT;

const MIN_INT_FOR_GCD = 1;
const RULES = 'Find the greatest common divisor of given numbers.';

function gcd(int $number1, int $number2): int
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

function generateGameData(): array
{
    $number1 = rand(MIN_INT_FOR_GCD, MAX_RANDOM_INT);
    $number2 = rand(MIN_INT_FOR_GCD, MAX_RANDOM_INT);

    $question = "{$number1} {$number2}";
    $correctAnswer = gcd($number1, $number2);

    return [$question, $correctAnswer];
}

function run(): void
{
    runGame(RULES, fn() => generateGameData());
}
