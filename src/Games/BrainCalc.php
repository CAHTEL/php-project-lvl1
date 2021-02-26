<?php

namespace Brain\Games\BrainCalc;

const DESCRIPTION = 'What is the result of the expression?';
const QUESTION_GAME_TEMPLATE = '%d %s %d';

/**
 * @return array
 */
function makeRoundData(): array
{
    $arr = generateRandMathExpression();
    try {
        $rightAnswer = getRightAnswer($arr['a'], $arr['b'], $arr['operation']);
    } catch (\Exception $exception) {
        exit();
    }

    return ['question' => generateQuestion($arr['a'], $arr['b'], $arr['operation']), 'answer' => (string) $rightAnswer];
}

/**
 * @param int $a
 * @param int $b
 * @param string $operation
 * @return string
 */
function generateQuestion(int $a, int $b, string $operation): string
{
    return sprintf(QUESTION_GAME_TEMPLATE, $a, $operation, $b);
}

/**
 * @param int $a
 * @param int $b
 * @param string $operation
 * @return int
 * @throws \Exception
 */
function getRightAnswer(int $a, int $b, string $operation): int
{
    return calculate($a, $b, $operation);
}

/**
 * @param int $a
 * @param int $b
 * @param string $operation
 * @return int
 * @throws \Exception
 */
function calculate(int $a, int $b, string $operation): int
{
    switch ($operation) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        default:
            throw new \Exception('unknown operation');
    }
}

/**
 * @return array
 */
function generateRandMathExpression(): array
{
    return ['a' => rand(0, 100), 'b' => rand(0, 100), 'operation' => generateRandOperation()];
}

/**
 * @return string
 */
function generateRandOperation(): string
{
    return rand(0, 9) % 2 === 0 ? '+' : '-';
}
