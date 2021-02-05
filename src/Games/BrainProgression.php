<?php

namespace Brain\Games\BrainProgression;

use function Brain\Engine\getResult;
use function Brain\Engine\getUserAnswer;
use function Brain\Math\generateArithmeticProgression;
use function Brain\Math\generateRandN;
use function Brain\Math\getPassElementFromProgression;
use function cli\line;

/**
 * @param string $name
 * @return array
 */
function startRound(string $name): array
{
    $progressionLen = rand(5, 10);
    $progression = generateArithmeticProgression(generateRandN(), generateRandN(), $progressionLen);
    $progression[rand(0, $progressionLen - 1)] = '..';
    ask($progression);
    $rightAnswer = getRightAnswer($progression);

    return getResult(getUserAnswer(), $rightAnswer, $name);
}

/**
 * @param array $arr
 * @return void
 */
function ask(array $arr): void
{
    line('Question: ' . implode(' ', $arr));
}

/**
 * @param array $arr
 * @return int
 */
function getRightAnswer(array $arr): int
{
    return getPassElementFromProgression($arr);
}
