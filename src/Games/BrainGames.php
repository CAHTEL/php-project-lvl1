<?php

namespace Brain\Games\BrainGames;

use function Brain\Engine\startGame;

function startBrainGamesGame(): void
{
    startGame('', function (): array {
        return [];
    });
}
