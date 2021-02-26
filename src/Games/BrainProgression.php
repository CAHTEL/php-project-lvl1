<?php

namespace Brain\Games\BrainProgression;

const DESCRIPTION = 'What number is missing in the progression?';
const QUESTION_GAME_TEMPLATE = '%s';

/**
 * @return array
 */
function makeRoundData(): array
{
    $progressionLen = rand(5, 10);
    $progression = generateArithmeticProgression(rand(0, 100), rand(0, 100), $progressionLen);
    $hiddenElementIndex = rand(0, $progressionLen - 1);
    $hiddenElementVal = $progression[$hiddenElementIndex];
    $progression[$hiddenElementIndex] = '..';

    return ['question' => generateQuestion($progression), 'answer' => (string) $hiddenElementVal];
}

/**
 * @param array $arr
 * @return string
 */
function generateQuestion(array $arr): string
{
    return sprintf(QUESTION_GAME_TEMPLATE, implode(' ', $arr));
}

/**
 * @param int $start
 * @param int $step
 * @param int $length
 * @return array
 */
function generateArithmeticProgression(int $start, int $step, int $length): array
{
    $arr = [];

    for ($i = 0; $i < $length; $i++) {
        $arr[$i] = $start + ($i * $step);
    }
    return $arr;
}
