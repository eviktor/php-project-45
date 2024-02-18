<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Engine\playGame;

function generateQuestionCallback(): array
{
    $rand = rand(1, 100);
    $question = "$rand";
    $correctAnswer = ($rand % 2 === 0 ? 'yes' : 'no');
    return [ $question, $correctAnswer ];
}

function runGame()
{
    playGame(
        'Answer "yes" if the number is even, otherwise answer "no".',
        __NAMESPACE__ . '\generateQuestionCallback'
    );
}
