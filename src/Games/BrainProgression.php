<?php

namespace Brain\Games\BrainProgression;

const DESCRIPTION = 'What number is missing in the progression?';
const TEMPLATE = 'Question: %s';

/**
 * @return array
 */
function startRound(): array
{
    $progressionLen = rand(5, 10);
    $progression = generateArithmeticProgression(rand(0, 100), rand(0, 100), $progressionLen);
    $progression[rand(0, $progressionLen - 1)] = '..';

    return ['question' => generateQuestion($progression), 'answer' => (string) getRightAnswer($progression)];
}

/**
 * @param array $arr
 * @return string
 */
function generateQuestion(array $arr): string
{
    return sprintf(TEMPLATE, implode(' ', $arr));
}

/**
 * @param array $arr
 * @return int
 */
function getRightAnswer(array $arr): int
{
    return getPassElementFromProgression($arr);
}

/**
 * @param array $arr
 * @return int
 */
function getPassElementFromProgression(array $arr): int
{
    $passI = array_search('..', $arr, true);
    $passI = (int) $passI;

    if ($passI == 0) {
        return (int) ($arr[$passI + 1] - ($arr[$passI + 2] - $arr[$passI + 1]));
    }

    if ($passI > 0 && $passI + 1 < count($arr)) {
        return (int) (($arr[$passI - 1] + $arr[$passI + 1]) / 2);
    }

    return (int) ($arr[$passI - 1] + $arr[1] - $arr[0]);
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
