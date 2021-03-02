<?php

namespace Brain\Games\BrainPrime;

use function Brain\Engine\startGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const QUESTION_GAME_TEMPLATE = '%d';

function startPrimeGame(): void
{
    startGame(DESCRIPTION, function (): array {
        $number = rand(0, 99);
        return [
            'question' => sprintf(QUESTION_GAME_TEMPLATE, $number),
            'answer' => isPrime($number) ? 'yes' : 'no',
        ];
    });
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
