<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

/**
 * @param string $description
 * @param callable $funcMakeRoundData
 */
function startGame(string $description, callable $funcMakeRoundData): void
{
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line($description);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $roundData = $funcMakeRoundData();
        line('Question: %s', $roundData['question']);
        $userAnswer = strtolower(prompt('Your answer'));

        if ($userAnswer !== $roundData['answer']) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'\n Let's try again, %s!",
                $userAnswer,
                $roundData['answer'],
                $userName
            );
            exit();
        }

        line('Correct!');
    }

    line("Congratulations, %s!", $userName);
}
