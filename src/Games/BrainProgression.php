<?php

namespace BrainGames\BrainProgression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\MAX_RANDOM_INT;
use const BrainGames\Engine\MIN_RANDOM_INT;

const MAX_INT_FOR_STEP = 10;
const PROG_ELEMENTS_COUNT = 10;
const RULES = 'What number is missing in the progression?';

function generateProgression(int $startNum, int $step, int $count): array
{
    $progression = [];
    for ($i = 0; $i < $count; $i++) {
        $progression[$i] = $startNum + $i * $step;
    }
    return $progression;
}

function generateGameData(): array
{
    $startNum = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);
    $step = rand(MIN_RANDOM_INT, MAX_INT_FOR_STEP);

    $progression = generateProgression($startNum, $step, PROG_ELEMENTS_COUNT);
    $randomIndex = rand(MIN_RANDOM_INT, PROG_ELEMENTS_COUNT - 1);

    $progWithoutRandomItem = $progression;
    $progWithoutRandomItem[$randomIndex] = '..';

    $question = implode(' ', $progWithoutRandomItem);
    $correctAnswer = $progression[$randomIndex];

    return [$question, $correctAnswer];
}

function run(): void
{
    runGame(RULES, fn() => generateGameData());
}
