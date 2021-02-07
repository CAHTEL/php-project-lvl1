<?php

namespace Brain\Games\BrainGcd;

use function Brain\Engine\getResult;
use function Brain\Engine\getUserAnswer;
use function Brain\Math\generateRandN;
use function Brain\Math\getGreatestCommonDivisor;
use function cli\line;

/**
 * @param string $name
 * @return array
 */
function startRound(string $name): array
{
    $a = generateRandN();
    $b = generateRandN();
    ask($a, $b);
    $rightAnswer = getRightAnswer($a, $b);

    return getResult(getUserAnswer(), (string) $rightAnswer, $name);
}

/**
 * @param int $a
 * @param int $b
 * @return void
 */
function ask(int $a, int $b): void
{
    line("Question: {$a} {$b}");
}

/**
 * @param int $a
 * @param int $b
 * @return int
 */
function getRightAnswer(int $a, int $b): int
{
    return getGreatestCommonDivisor($a, $b);
}
