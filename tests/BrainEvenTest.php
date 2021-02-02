<?php
use PHPUnit\Framework\TestCase;
use function Brain\Games\BrainEven\getRightAnswer;
use function Brain\Math\generateRandN;
use function Brain\Math\isEven;

class BrainEvenTest extends TestCase
{
    public function testGetRightAnswer()
    {
        $n = generateRandN();
        $answer = getRightAnswer($n);

        if (isEven($n)) {
            $this->assertEquals('yes', $answer);
        } else {
            $this->assertEquals('no', $answer);
        }
    }
}
