<?php

namespace BrainGames\EvenGame;

use function BrainGames\BaseGame\playGame;

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
        'BrainGames\EvenGame\generateQuestionCallback'
    );
}
