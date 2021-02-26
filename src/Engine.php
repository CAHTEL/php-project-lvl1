<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_ROUNDS = 3;

const SUCCESS_RESULT_MESSAGE = 'Correct!';
const NOT_SUCCESS_RESULT_MESSAGE = "'%s' is wrong answer ;(. Correct answer was '%s'\n Let's try again, %s!";
const MAIN_QUESTION_TEMPLATE = 'Question: %s';

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

    for ($i = 0; $i < COUNT_ROUNDS; $i++) {
        $roundData = $funcMakeRoundData();
        line(MAIN_QUESTION_TEMPLATE, $roundData['question']);
        $userAnswer = strtolower(prompt('Your answer'));

        if ($userAnswer !== $roundData['answer']) {
            line(NOT_SUCCESS_RESULT_MESSAGE, $userAnswer, $roundData['answer'], $userName);
            exit();
        }

        line(SUCCESS_RESULT_MESSAGE);
    }

    line("Congratulations, {$userName}!");
}
