<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\Engine\playGame;

function generateQuestionCallback(): array
{
    $operations = [ '+', '-', '*' ];
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    $operation = $operations[array_rand($operations)];

    $expression = "$number1 $operation $number2";
    var_dump($expression);
    $correctAnswer = eval("return ($expression);");
    return [ $expression, "$correctAnswer" ];
}

function runGame()
{
    playGame(
        'What is the result of the expression?',
        'BrainGames\Games\CalcGame\generateQuestionCallback'
    );
}
