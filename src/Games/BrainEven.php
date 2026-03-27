<?php

namespace BrainGames\BrainEven;

use function BrainGames\Engine\runGame;

const MIN_RANDOM_INT = 0;
const MAX_RANDOM_INT = 100;

function getGameRules(): string
{
    $rules = 'Answer "yes" if the number is even, otherwise answer "no".';
    return $rules;
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function generateGameData(): array
{
    $question = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);
    $correctAnswer = isEven($question) ? 'yes' : 'no';
    return [$question, $correctAnswer];
}

function run(): void
{
    $gameRules = getGameRules();
    runGame($gameRules, fn() => generateGameData());
}
