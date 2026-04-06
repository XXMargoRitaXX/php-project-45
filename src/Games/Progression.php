<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\runGame;

const MAX_INT_FOR_STEP = 10;
const MAX_RANDOM_INT = 100;
const MIN_RANDOM_INT = 0;
const PROG_ELEMENTS_COUNT = 10;
const RULES = 'What number is missing in the progression?';

function run(): void
{
    $generateGameDataFunc = static function (): array {
        $startNum = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);
        $step = rand(MIN_RANDOM_INT, MAX_INT_FOR_STEP);
        $progression = [];
        for ($i = 0; $i < PROG_ELEMENTS_COUNT; $i++) {
            $progression[$i] = $startNum + $i * $step;
        }

        $randomIndex = rand(MIN_RANDOM_INT, PROG_ELEMENTS_COUNT - 1);

        $progWithoutRandomItem = $progression;
        $progWithoutRandomItem[$randomIndex] = '..';

        $question = implode(' ', $progWithoutRandomItem);
        $correctAnswer = $progression[$randomIndex];

        return [$question, $correctAnswer];
    };

    runGame(RULES, $generateGameDataFunc);
}
