<?php

namespace Brain\Games\BrainGcd;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const TEMPLATE = 'Question: %d %d';

/**
 * @return array
 */
function startRound(): array
{
    $a = rand(0, 100);
    $b = rand(0, 100);
    return ['question' => generateQuestion($a, $b), 'answer' => (string) getRightAnswer($a, $b)];
}

/**
 * @param int $a
 * @param int $b
 * @return string
 */
function generateQuestion(int $a, int $b): string
{
    return sprintf(TEMPLATE, $a, $b);
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

/**
 * @param int $a
 * @param int $b
 * @return int
 */
function getGreatestCommonDivisor(int $a, int $b): int
{
    if ($b == 0) {
        return abs($a);
    }
    return getGreatestCommonDivisor($b, $a % $b);
}
