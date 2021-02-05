<?php
use PHPUnit\Framework\TestCase;
use function Brain\Games\BrainProgression\getRightAnswer;
use function Brain\Math\generateArithmeticProgression;
use function Brain\Math\generateRandN;
use function Brain\Math\getPassElementFromProgression;

class BrainProgressionTest extends TestCase
{
    public function testGetRightAnswer()
    {
        $progressionLen = rand(5, 10);
        $progression = generateArithmeticProgression(generateRandN(), generateRandN(), $progressionLen);
        $progression[rand(5, $progressionLen)] = '..';
        $rightAnswer = getRightAnswer($progression);
        $this->assertEquals($rightAnswer, getPassElementFromProgression($progression));
    }
}
