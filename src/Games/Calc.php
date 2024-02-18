<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

function generateQuestionCallback(): array
{
    $operations = [ '+', '-', '*' ];
    $number1 = rand(1, 100);
    $number2 = rand(1, 100);
    $operation = $operations[array_rand($operations)];

    $expression = "$number1 $operation $number2";
    $correctAnswer = eval("return ($expression);");
    return [ $expression, "$correctAnswer" ];
}

function run()
{
    playGame(
        'What is the result of the expression?',
        __NAMESPACE__ . '\generateQuestionCallback'
    );
}
