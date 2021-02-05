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

/**
 * @param array $arr
 * @return int
 */
function getPassElementFromProgression(array $arr): int
{
    $passI = array_search('..', $arr);

    if ($passI == 0) {
        return $arr[$passI + 1] - ($arr[$passI + 2] - $arr[$passI + 1]);
    }

    if ($passI > 0 && $passI + 1 < count($arr)) {
        return ($arr[$passI - 1] + $arr[$passI + 1]) / 2;
    }

    return $arr[$passI - 1] + $arr[1] - $arr[0];
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
