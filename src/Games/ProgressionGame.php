<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\Engine\playGame;

function getProgression(int $length): array
{
    $first = rand(1, 30);
    $step = rand(1, 10);

    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[$i] = $first + $step * $i;
    }

    return $progression;
}


function generateQuestionCallback(): array
{
    $progression = getProgression(10);

    $missingIndex = array_rand($progression);
    $correctAnswer = "$progression[$missingIndex]";
    $progression[$missingIndex] = '..';

    $question = implode(' ', $progression);

    return [ $question, $correctAnswer ];
}

function runGame()
{
    playGame(
        'Find the greatest common divisor of given numbers.',
        __NAMESPACE__ . '\generateQuestionCallback'
    );
}
