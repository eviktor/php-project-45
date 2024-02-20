<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\run;

use const BrainGames\Engine\MAX_RANDOM_NUMBER;

function buildQuestionCallback(): array
{
    $rand = rand(1, MAX_RANDOM_NUMBER);

    $question = "$rand";
    $correctAnswer = ($rand % 2 === 0 ? 'yes' : 'no');

    return [ $question, $correctAnswer ];
}

function runGame()
{
    run(
        'Answer "yes" if the number is even, otherwise answer "no".',
        __NAMESPACE__ . '\buildQuestionCallback'
    );
}
