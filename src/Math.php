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
 * @return int
 */
function generateRandN(): int
{
    return rand(0, 1000);
}
