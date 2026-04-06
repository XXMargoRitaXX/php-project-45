<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\runGame;

const MAX_RANDOM_INT = 100;
const MIN_RANDOM_INT = 0;
const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run(): void
{
    $generateGameDataFunc = static function (): array {
        $question = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };

    runGame(RULES, $generateGameDataFunc);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    if ($number === 2) {
        return true;
    }

    if ($number % 2 === 0) {
        return false;
    }

    $count = intval(ceil(sqrt($number)));
    for ($i = 3; $i <= $count; $i += 2) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
