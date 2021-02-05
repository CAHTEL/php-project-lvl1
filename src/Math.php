<?php

namespace Brain\Math;

/**
 * @param $n
 * @return bool
 */
function isEven($n): bool
{
    return is_numeric($n) && $n % 2 == 0;
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
 * @return int
 */
function generateRandN(): int
{
    return rand(0, 100);
}

/**
 * @return string
 */
function generateRandOperation(): string
{
    return rand(0, 9) % 2 === 0 ? '+' : '-';
}

/**
 * @return array
 */
function generateRandMathExpression(): array
{
    return ['a' => generateRandN(), 'b' => generateRandN(), 'operation' => generateRandOperation()];
}
