<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\run;
use function BrainGames\GCD\calcGCD;

use const BrainGames\Engine\MAX_RANDOM_NUMBER;

function buildQuestionCallback(): array
{
    $a = rand(1, MAX_RANDOM_NUMBER);
    $b = rand(1, MAX_RANDOM_NUMBER);

    $question = "$a $b";
    $correctAnswer = calcGCD($a, $b);

    return [ $question, "$correctAnswer" ];
}

function runGame()
{
    run(
        'Find the greatest common divisor of given numbers.',
        __NAMESPACE__ . '\buildQuestionCallback'
    );
}
