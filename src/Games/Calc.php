<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\runGame;

const MAX_INT_FOR_MULT = 10; // для избежания сложных примеров
const MAX_RANDOM_INT = 100;
const MIN_RANDOM_INT = 0;
const RULES = 'What is the result of the expression?';

function run(): void
{
    $generateGameDataFunc = static function (): array {
        $operations = ['+', '-', '*'];
        $operationsCount = count($operations);
        $operation = $operations[rand(0, $operationsCount - 1)];

        $number1 = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);
        $adjustedMax = $operation === '*' ? MAX_INT_FOR_MULT : MAX_RANDOM_INT;
        $number2 = rand(MIN_RANDOM_INT, $adjustedMax);

        $question = "{$number1} {$operation} {$number2}";
        $correctAnswer = calculate($number1, $number2, $operation);

        return [$question, $correctAnswer];
    };

    runGame(RULES, $generateGameDataFunc);
}

function calculate(int $number1, int $number2, string $operation): int
{
    return match ($operation) {
        '+' => $number1 + $number2,
        '-' => $number1 - $number2,
        '*' => $number1 * $number2,
        default => throw new \InvalidArgumentException("Unknown operation: {$operation}"),
    };
}
