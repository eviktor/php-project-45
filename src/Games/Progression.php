<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

use const BrainGames\Engine\MAX_RANDOM_NUMBER;

const PROGRESSION_LENGTH = 10;
const PROGRESSION_MAX_STEP = 10;

function genProgression(int $length): array
{
    $first = rand(1, MAX_RANDOM_NUMBER);
    $step = rand(1, PROGRESSION_MAX_STEP);

    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[$i] = $first + $step * $i;
    }

    return $progression;
}


function buildQuestionCallback(): array
{
    $progression = genProgression(PROGRESSION_LENGTH);

    $missingIndex = array_rand($progression);
    $correctAnswer = "$progression[$missingIndex]";
    $progression[$missingIndex] = '..';

    $question = implode(' ', $progression);

    return [ $question, $correctAnswer ];
}

function runGame()
{
    run(
        'What number is missing in the progression?',
        __NAMESPACE__ . '\buildQuestionCallback'
    );
}
