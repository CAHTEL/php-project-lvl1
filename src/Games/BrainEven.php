<?php

namespace Brain\Games\BrainEven;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const TEMPLATE = 'Question: %d';

/**
 * @return array
 */
function startRound(): array
{
    $n = rand(0, 100);

    return ['question' => generateQuestion($n), 'answer' => (string) getRightAnswer($n)];
}

/**
 * @return string
 */
function getDescription(): string
{
    return DESCRIPTION;
}

/**
 * @param int $n
 * @return string
 */
function generateQuestion(int $n): string
{
    return sprintf(TEMPLATE, $n);
}

/**
 * @param int $n
 * @return string
 */
function getRightAnswer(int $n): string
{
    return isEven((string) $n) ? 'yes' : 'no';
}

/**
 * @param string $n
 * @return bool
 */
function isEven(string $n): bool
{
    return is_numeric($n) && (int) $n % 2 == 0;
}
