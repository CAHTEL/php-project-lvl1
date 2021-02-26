<?php

namespace Brain\Games\BrainPrime;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
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
    return isPrime($n) ? 'yes' : 'no';
}

/**
 * @param int $num
 * @return bool
 */
function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}
