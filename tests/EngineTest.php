<?php
use PHPUnit\Framework\TestCase;

use function Brain\Engine\getDescriptionByName;
use function Brain\Engine\showDescription;
use const Brain\Engine\GAME_EVEN;
use const Brain\Engine\GAME_DESCRIPTIONS;

use function Brain\Engine\selectGame;
use function Brain\Engine\isGamesNameCorrect;

class EngineTest extends TestCase
{
    public function testSelectGame()
    {
        $this->assertEquals(GAME_EVEN, selectGame());
    }

    public function testIsGamesNameCorrect()
    {
        $wrongName = 'qwe';
        $this->assertFalse(isGamesNameCorrect($wrongName));

        $goodName = GAME_EVEN;
        $this->assertTrue(isGamesNameCorrect($goodName));
    }

    public function testGetDescriptionByName()
    {
        $name = GAME_EVEN;
        $description = GAME_DESCRIPTIONS[GAME_EVEN];
        $this->assertEquals($description, getDescriptionByName($name));
    }
}
