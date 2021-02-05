<?php
use PHPUnit\Framework\TestCase;

use function Brain\Engine\getDescriptionByName;
use function Brain\Engine\getResult;
use function Brain\Engine\selectGame;

use const Brain\Engine\GAME_EVEN;
use const Brain\Engine\GAME_DESCRIPTIONS;
use const Brain\Engine\NOT_SUCCESS_RESULT_MESSAGE;
use const Brain\Engine\SUCCESS_RESULT_MESSAGE;


class EngineTest extends TestCase
{
    public function testSelectGame()
    {
        $this->assertEquals(GAME_EVEN, selectGame());
    }

    public function testGetDescriptionByName()
    {
        $name = GAME_EVEN;
        $description = GAME_DESCRIPTIONS[GAME_EVEN];
        $this->assertEquals($description, getDescriptionByName($name));
    }

    public function testGetResult()
    {
        $rightAnswer = 'yes';
        $userAnswer = 'yes';
        $userName = 'Tester';
        $result = getResult($userAnswer, $rightAnswer, $userName);
        $this->assertTrue($result['success']);
        $this->assertEquals(SUCCESS_RESULT_MESSAGE, $result['mes']);

        $userAnswer = 'no';
        $result = getResult($userAnswer, $rightAnswer, $userName);
        $this->assertFalse($result['success']);
        $this->assertEquals(
            sprintf(NOT_SUCCESS_RESULT_MESSAGE, $userAnswer, $rightAnswer, $userName),
            $result['mes']
        );
    }
}
