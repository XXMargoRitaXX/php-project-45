<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(string $gameRules, callable $generateGameDataFunc): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, {$userName}!");

    line($gameRules);

    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        [$question, $correctAnswer] = $generateGameDataFunc();

        line("Question: {$question}");
        $answer = prompt('Your answer');

        if ($answer !== (string) $correctAnswer) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$userName}!");
            return;
        }

        line('Correct!');
    }

    line("Congratulations, {$userName}!");
}
