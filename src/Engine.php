<?php

namespace Brain\Engine;

use function Brain\Cli\sayHello;
use function cli\line;
use function cli\prompt;

const COUNT_ROUNDS = 3;

const SUCCESS_RESULT_MESSAGE = "Correct!";
const NOT_SUCCESS_RESULT_MESSAGE = "'%s' is wrong answer ;(. Correct answer was '%s'\n Let's try again, %s!";

/**
 * @param string $userAnswer
 * @param string $rightAnswer
 * @param string $userName
 * @return array
 */
function getResult(string $userAnswer, string $rightAnswer, string $userName): array
{
    if ($userAnswer !== $rightAnswer) {
        return [
            'success' => false,
            'mes' => sprintf(NOT_SUCCESS_RESULT_MESSAGE, $userAnswer, $rightAnswer, $userName)
        ];
    }

    return ['success' => true, 'mes' => SUCCESS_RESULT_MESSAGE];
}

/**
 * @return string
 */
function getUserAnswer(): string
{
    return strtolower(prompt('Your answer'));
}

/**
 * @param string $gameName
 */
function startGame(string $gameName): void
{
    $userName = sayHello();
    $game = "Brain\Games\\{$gameName}";
    $funcStart = "\\{$game}\startRound";
    $funcGetDescription = "\\{$game}\getDescription";

    line($funcGetDescription());

    for ($i = 0; $i < COUNT_ROUNDS; $i++) {
        $roundData = $funcStart();
        line($roundData['question']);
        $gameResult = getResult(getUserAnswer(), $roundData['answer'], $userName);
        line($gameResult['mes']);

        if (!$gameResult['success']) {
            exit();
        }
    }

    line("Congratulations, {$userName}!");
}
