<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\greet;
use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(string $gameRules, callable $generateGameDataFunc): void
{
    $userName = greet();

    line($gameRules);

    for ($currentRound = 1; $currentRound <= ROUNDS_COUNT; $currentRound++) {
        [$question, $correctAnswer] = $generateGameDataFunc();

        line("Question: {$question}");
        $answer = prompt('Your answer');

        if ($answer === (string) $correctAnswer) {
            line('Correct!');
        } else {
            exit("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'." . PHP_EOL
                . "Let's try again, {$userName}!" . PHP_EOL);
        }
    }

    line("Congratulations, {$userName}!");
}
