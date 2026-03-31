<?php

namespace BrainGames\BrainCalc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\MAX_RANDOM_INT;
use const BrainGames\Engine\MIN_RANDOM_INT;

const MAX_INT_FOR_MULT = 10;
const RULES = 'What is the result of the expression?';

function calculate(int $number1, int $number2, string $operation): int
{
    return match ($operation) {
        '+' => $number1 + $number2,
        '-' => $number1 - $number2,
        '*' => $number1 * $number2,
    };
}

function generateGameData(): array
{
    $number1 = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);
    $number2 = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);

    $operations = ['+', '-', '*'];
    $operationsCount = count($operations);
    $operation = $operations[rand(0, $operationsCount - 1)];

    if ($operation === '*' && $number2 > MAX_INT_FOR_MULT) {
        $number2 %= MAX_INT_FOR_MULT;
    }

    $question = "{$number1} {$operation} {$number2}";
    $correctAnswer = calculate($number1, $number2, $operation);

    return [$question, $correctAnswer];
}

function run(): void
{
    runGame(RULES, fn() => generateGameData());
}
