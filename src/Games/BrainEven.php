<?php

namespace Brain\Games\BrainEven;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const QUESTION_GAME_TEMPLATE = '%d';

/**
 * @return array
 */
function makeRoundData(): array
{
    $n = rand(0, 100);

    return ['question' => generateQuestion($n), 'answer' => getRightAnswer($n)];
}

/**
 * @param int $n
 * @return string
 */
function generateQuestion(int $n): string
{
    return sprintf(QUESTION_GAME_TEMPLATE, $n);
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
