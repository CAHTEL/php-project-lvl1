<?php
use PHPUnit\Framework\TestCase;
use function Brain\Games\BrainCalc\getRightAnswer;
use function Brain\Math\calculate;
use function Brain\Math\generateRandMathExpression;

class BrainCalcTest extends TestCase
{
    public function testGetRightAnswer()
    {
        $arr = generateRandMathExpression();
        $rightAnswer = getRightAnswer($arr['a'], $arr['b'], $arr['operation']);
        $this->assertEquals($rightAnswer, calculate($arr['a'], $arr['b'], $arr['operation']));
    }
}
