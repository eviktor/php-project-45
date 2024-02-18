<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\playGame;
use function BrainGames\GCD\getGCD;

function generateQuestionCallback(): array
{
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);

    $question = "$number1 $number2";
    $correctAnswer = getGCD($number1, $number2);
    return [ $question, "$correctAnswer" ];
}

function run()
{
    playGame(
        'Find the greatest common divisor of given numbers.',
        __NAMESPACE__ . '\generateQuestionCallback'
    );
}
