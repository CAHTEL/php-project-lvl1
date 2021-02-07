<?php

namespace Brain\Games\BrainCalc;

use function Brain\Engine\getResult;
use function Brain\Engine\getUserAnswer;
use function Brain\Math\calculate;
use function Brain\Math\generateRandMathExpression;
use function cli\line;

/**
 * @param string $name
 * @return array
 */
function startRound(string $name): array
{
    $arr = generateRandMathExpression();
    ask($arr['a'], $arr['b'], $arr['operation']);

    try {
        $rightAnswer = getRightAnswer($arr['a'], $arr['b'], $arr['operation']);
    } catch (\Exception $exception) {
        line('something wrong was happened!');
        exit();
    }

    return getResult(getUserAnswer(), (string) $rightAnswer, $name);
}

/**
 * @param int $a
 * @param int $b
 * @param string $operation
 * @return void
 */
function ask(int $a, int $b, string $operation): void
{
    line("Question: {$a} {$operation} {$b}");
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
