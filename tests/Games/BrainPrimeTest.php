<?php
use PHPUnit\Framework\TestCase;
use function Brain\Games\BrainPrime\getRightAnswer;
use function Brain\Math\generateRandN;
use function Brain\Math\isPrime;

class BrainPrimeTest extends TestCase
{
    public function testGetRightAnswer()
    {
        $n = generateRandN();
        $rightAnswer = getRightAnswer($n);
        if (isPrime($n)) {
            $this->assertEquals('yes', $rightAnswer);
        } else {
            $this->assertEquals('no', $rightAnswer);
        }    }
}
