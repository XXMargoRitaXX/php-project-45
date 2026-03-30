<?php

namespace BrainGames\BrainGcd;

use function BrainGames\Engine\runGame;

const MIN_RANDOM_INT = 1;
const MAX_RANDOM_INT = 100;

function getGameRules(): string
{
    $rules = 'Find the greatest common divisor of given numbers.';
    return $rules;
}

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
    $number1 = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);
    $number2 = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);

    $question = "{$number1} {$number2}";
    $correctAnswer = gcd($number1, $number2);

    return [$question, $correctAnswer];
}

function run(): void
{
    $gameRules = getGameRules();
    runGame($gameRules, fn() => generateGameData());
}
