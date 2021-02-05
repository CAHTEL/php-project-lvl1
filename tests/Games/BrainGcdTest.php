<?php
use PHPUnit\Framework\TestCase;
use function Brain\Games\BrainGcd\getRightAnswer;
use function Brain\Math\generateRandN;
use function Brain\Math\getGreatestCommonDivisor;

class BrainGcdTest extends TestCase
{
    public function testGetRightAnswer()
    {
        $a = generateRandN();
        $b = generateRandN();
        $rightAnswer = getRightAnswer($a, $b);
        $this->assertEquals($rightAnswer, getGreatestCommonDivisor($a, $b));
    }
}
