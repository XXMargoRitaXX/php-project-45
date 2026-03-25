<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;
const MIN_RANDOM_INT = 0;
const MAX_RANDOM_INT = 100;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function runGame(string $userName): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($currentRound = 1; $currentRound <= ROUNDS_COUNT; $currentRound++) {
        $number = rand(MIN_RANDOM_INT, MAX_RANDOM_INT);
        
        line("Question: %d", $number);
        $answer = prompt('Your answer');

        $correctAnswer = isEven($number) ? 'yes' : 'no';

        if ($answer === $correctAnswer) {
            line('Correct!');    
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'. Let's try again, %s!", $answer, $correctAnswer, $userName);
            break;
        }
    }

    if ($currentRound > ROUNDS_COUNT) {
        line("Congratulations, %s!", $userName);
    } 
}
