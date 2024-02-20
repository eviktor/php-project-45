<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;
use function BrainGames\Prime\isPrimeLessThan1000;

use const BrainGames\Engine\MAX_RANDOM_NUMBER;

function buildQuestionCallback(): array
{
    $random = rand(1, MAX_RANDOM_NUMBER);

    $question = "$random";
    $correctAnswer = isPrimeLessThan1000($random) ? 'yes' : 'no';

    return [ $question, $correctAnswer ];
}

function runGame()
{
    run(
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        __NAMESPACE__ . '\buildQuestionCallback'
    );
}
