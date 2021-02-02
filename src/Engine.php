<?php

namespace Brain\Engine;

use function Brain\Cli\sayHello;
use function cli\line;

const GAME_EVEN = 'brain-even';

const GAME_LIST = [
    0 => GAME_EVEN,
];

const GAME_DESCRIPTIONS = [
    GAME_EVEN => 'Answer "yes" if the number is even, otherwise answer "no".'
];

/**
 * @return string Name of Game
 */
function selectGame(): string
{
    return GAME_LIST[0];
}

/**
 * @param string $name
 * @return bool
 */
function isGamesNameCorrect(string $name): bool
{
    return in_array($name, GAME_LIST);
}

/**
 * @param string $name
 * @return string
 */
function getDescriptionByName(string $name): string
{
    return GAME_DESCRIPTIONS[$name];
}

/**
 * @param string $name
 */
function showDescription(string $name): void
{
    line(getDescriptionByName($name));
}

/**
 * @param string $gameName
 */
function startGame(string $gameName): void
{
    $userName = sayHello();
    showDescription($gameName);

    switch ($gameName) {
        case GAME_EVEN:
            \Brain\Games\BrainEven\start($userName);
            break;
    }
}
