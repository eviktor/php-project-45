<?php

namespace BrainGames\Cli;

use function BrainGames\Engine\showWelcomeMessage;
use function BrainGames\Engine\askNameAndGreet;

function greet()
{
    showWelcomeMessage();
    askNameAndGreet();
}
