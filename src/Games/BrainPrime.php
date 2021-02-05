<?php

namespace Brain\Games\BrainPrime;

use function Brain\Engine\getResult;
use function Brain\Engine\getUserAnswer;
use function Brain\Math\generateRandN;
use function Brain\Math\isPrime;
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
    return isPrime($n) ? 'yes' : 'no';
}
