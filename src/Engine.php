<?php

namespace Brain\Engine;

use function Brain\Cli\sayHello;
use function cli\line;
use function cli\prompt;

const COUNT_ROUNDS = 3;
const GAME_EVEN = 'BrainEven';
const GAME_CALC = 'BrainCalc';
const GAME_GCD = 'BrainGcd';

const SUCCESS_RESULT_MESSAGE = "Correct!";
const NOT_SUCCESS_RESULT_MESSAGE = "'%s' is wrong answer ;(. Correct answer was '%s'\n Let's try again, %s!";

const GAME_LIST = [
    0 => GAME_EVEN,
    1 => GAME_CALC,
    2 => GAME_GCD,
];

const GAME_DESCRIPTIONS = [
    GAME_EVEN => 'Answer "yes" if the number is even, otherwise answer "no".',
    GAME_CALC => 'What is the result of the expression?',
    GAME_GCD => 'Find the greatest common divisor of given numbers.',
];

/**
 * @return string Name of Game
 */
function selectGame(): string
{
    return GAME_LIST[0];
}

/**
 * @param string $name
 * @return bool
 */
function isGamesNameCorrect(string $name): bool
{
    return in_array($name, GAME_LIST);
}

/**
 * @param string $name
 * @return string
 */
function getDescriptionByName(string $name): string
{
    return GAME_DESCRIPTIONS[$name];
}

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
 * @param string $name
 */
function showDescription(string $name): void
{
    line(getDescriptionByName($name));
}

/**
 * @param $result
 */
function showResult(string $result): void
{
    line($result);
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
    showDescription($gameName);

    $funcStart = "\Brain\Games\\{$gameName}\startRound";

    for ($i = 0; $i < COUNT_ROUNDS; $i++) {
        $gameResult = $funcStart($userName);
        showResult($gameResult['mes']);

        if (!$gameResult['success']) {
            exit();
        }
    }

    line("Congratulations, {$userName}!");
}
