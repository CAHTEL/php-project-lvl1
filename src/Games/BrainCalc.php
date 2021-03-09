<?php

namespace Brain\Games\BrainCalc;

use function Brain\Engine\playGame;

const DESCRIPTION = 'What is the result of the expression?';
const QUESTION_GAME_TEMPLATE = '%d %s %d';
const AVAILABLE_OPERATORS = ['+', '-', '*'];

function startCalcGame(): void
{
    playGame(DESCRIPTION, function (): array {
        $firstNumber = rand(0, 100);
        $secondNumber = rand(0, 100);
        $operation = AVAILABLE_OPERATORS[array_rand(AVAILABLE_OPERATORS, 1)];

        try {
            $rightAnswer = calculate($firstNumber, $secondNumber, $operation);
        } catch (\Exception $exception) {
            exit();
        }

        return [
            'question' => sprintf(QUESTION_GAME_TEMPLATE, $firstNumber, $operation, $secondNumber),
            'answer' => (string) $rightAnswer,
        ];
    });
}

/**
 * @param int $firstNumber
 * @param int $secondNumber
 * @param string $operation
 * @return int
 * @throws \Exception
 */
function calculate(int $firstNumber, int $secondNumber, string $operation): int
{
    switch ($operation) {
        case '+':
            return $firstNumber + $secondNumber;
        case '-':
            return $firstNumber - $secondNumber;
        case '*':
            return $firstNumber * $secondNumber;
        default:
            throw new \Exception('unknown operation');
    }
}
