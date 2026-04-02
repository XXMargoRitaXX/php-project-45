<?php

namespace BrainGames\Even;

use function BrainGames\Engine\runGame;

const MAX_RANDOM_INT = 100;
const MIN_RANDOM_INT = 0;
const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function run(): void
{
    $generateGameDataFunc = function (): array {
        $question = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };

    runGame(RULES, $generateGameDataFunc);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
