<?php

namespace Brain\Games\BrainEven;

use function Brain\Engine\startGame;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function startEvenGame(): void
{
    startGame(DESCRIPTION, function (): array {
        $numberForCheck = rand(0, 100);
        return ['question' => (string) $numberForCheck, 'answer' => isEven($numberForCheck) ? 'yes' : 'no'];
    });
}

/**
 * @param string $n
 * @return bool
 */
function isEven(string $n): bool
{
    return is_numeric($n) && (int) $n % 2 == 0;
}
