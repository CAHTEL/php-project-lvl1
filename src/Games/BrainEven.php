<?php

namespace Brain\Games\BrainEven;

use function Brain\Engine\getResult;
use function Brain\Engine\getUserAnswer;
use function Brain\Math\generateRandN;
use function Brain\Math\isEven;
use function cli\line;

/**
 * @param string $name
 * @return array
 */
function startRound(string $name): array
{
    $n = generateRandN();
    ask($n);
    $rightAnswer = getRightAnswer($n);

    return getResult(getUserAnswer(), $rightAnswer, $name);
}

/**
 * @param int $n
 * @return void
 */
function ask(int $n): void
{
    line("Question: {$n}");
}

/**
 * @param int $n
 * @return string
 */
function getRightAnswer(int $n): string
{
    return isEven((string) $n) ? 'yes' : 'no';
}
