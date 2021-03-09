<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

/**
 * @param string $description
 * @param callable $makeRoundData
 */
function playGame(string $description, callable $makeRoundData): void
{
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line($description);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        ['question' => $roundQuestion, 'answer' => $rightAnswer] = $makeRoundData();
        line('Question: %s', $roundQuestion);
        $userAnswer = strtolower(prompt('Your answer'));

        if ($userAnswer !== $rightAnswer) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'",
                $userAnswer,
                $rightAnswer,
                $userName
            );
            line("Let's try again, %s!");
            exit();
        }

        line('Correct!');
    }

    line("Congratulations, %s!", $userName);
}
