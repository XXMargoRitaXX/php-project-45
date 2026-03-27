<?php

namespace BrainGames\BrainCalc;

use function BrainGames\Engine\runGame;

const MIN_RANDOM_INT = 0;
const MAX_RANDOM_INT = 100;
const MAX_INT_FOR_MULT = 10;

function getRules(): string
{
    $rules = 'What is the result of the expression?';
    return $rules;
}

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
    $gameRules = getRules();
    runGame($gameRules, fn() => generateGameData());
}
