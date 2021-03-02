<?php

namespace Brain\Games\BrainGcd;

use function Brain\Engine\startGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const QUESTION_GAME_TEMPLATE = '%d %d';

function startGcdGame(): void
{
    startGame(DESCRIPTION, function (): array {
        $firstNumber = rand(0, 99);
        $secondNumber = rand(0, 99);
        return [
            'question' => sprintf(QUESTION_GAME_TEMPLATE, $firstNumber, $secondNumber),
            'answer' => (string) getGreatestCommonDivisor($firstNumber, $secondNumber),
        ];
    });
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
