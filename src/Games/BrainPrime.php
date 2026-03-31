<?php

namespace BrainGames\BrainPrime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\MAX_RANDOM_INT;
use const BrainGames\Engine\MIN_RANDOM_INT;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    $isPrime = true;

    if ($number < 2) {
        $isPrime = false;
    } elseif ($number === 2) {
        $isPrime = true;
    } elseif ($number % 2 === 0) {
        $isPrime = false;
    } else {
        $count = intval(ceil(sqrt($number)));
        for ($i = 3; $i <= $count; $i += 2) {
            if ($number % $i === 0) {
                $isPrime = false;
            }
        }
    }

    return $isPrime;
}

function generateGameData(): array
{
    $question = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);
    $correctAnswer = isPrime($question) ? 'yes' : 'no';
    return [$question, $correctAnswer];
}

function run(): void
{
    runGame(RULES, fn() => generateGameData());
}
