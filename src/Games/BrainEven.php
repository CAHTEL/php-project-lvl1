<?php

namespace Brain\Games\BrainEven;

use function Brain\Math\generateRandN;
use function Brain\Math\isEven;
use function cli\line;
use function cli\prompt;

/**
 * @param string $name
 */
function start(string $name): void
{
    for ($i = 0; $i < 3; $i++) {
        $n = generateRandN();
        ask($n);
        $rightAnswer = getRightAnswer($n);
        $usersAnswer = getAnswer();

        if ($usersAnswer !== $rightAnswer) {
            line("'{$usersAnswer}' is wrong answer is wrong answer ;(. Correct answer was '{$rightAnswer}'");
            line("Let's try again, {$name}!");
            exit();
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}

/**
 * @param int $n
 * @return void
 */
function ask(int $n): void
{
    line("Question: {$n}");
}

/**
 * @param int $n
 * @return string
 */
function getRightAnswer(int $n): string
{
    return isEven($n) ? 'yes' : 'no';
}
/**
 * @return string
 */
function getAnswer(): string
{
    return strtolower(prompt('Your answer'));
}
