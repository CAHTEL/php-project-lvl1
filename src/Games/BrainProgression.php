<?php

namespace Brain\Games\BrainProgression;

use function Brain\Engine\startGame;

const DESCRIPTION = 'What number is missing in the progression?';
const QUESTION_GAME_TEMPLATE = '%s';

function startProgressionGame(): void
{
    startGame(DESCRIPTION, function (): array {
        $progressionLength = rand(5, 10);
        $progression = generateArithmeticProgression(rand(0, 100), rand(0, 100), $progressionLength);
        $hiddenElementIndex = rand(0, $progressionLength - 1);
        $hiddenElementVal = $progression[$hiddenElementIndex];
        $progression[$hiddenElementIndex] = '..';

        return [
            'question' => sprintf(QUESTION_GAME_TEMPLATE, implode(' ', $progression)),
            'answer' => (string) $hiddenElementVal,
        ];
    });
}

/**
 * @param int $start
 * @param int $step
 * @param int $length
 * @return array
 */
function generateArithmeticProgression(int $start, int $step, int $length): array
{
    $result = [];

    for ($i = 0; $i < $length; $i++) {
        $result[$i] = $start + ($i * $step);
    }
    return $result;
}
