<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;
use function BrainGames\Prime\isPrimeLess1000;

function generateQuestionCallback(): array
{
    $random = rand(2, 100);
    $question = "$random";
    $correctAnswer = isPrimeLess1000($random) ? 'yes' : 'no';

    return [ $question, $correctAnswer ];
}

function run()
{
    playGame(
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        __NAMESPACE__ . '\generateQuestionCallback'
    );
}
