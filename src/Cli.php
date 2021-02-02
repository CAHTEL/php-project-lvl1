<?php

namespace Brain\Cli;

use function cli\line;
use function cli\prompt;

/**
 * @return string
 */
function sayHello(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
