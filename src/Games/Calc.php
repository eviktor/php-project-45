<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

use const BrainGames\Engine\MAX_RANDOM_NUMBER;

function buildQuestionCallback(): array
{
    $a = rand(1, MAX_RANDOM_NUMBER);
    $b = rand(1, MAX_RANDOM_NUMBER);
    $operations = [ '+', '-', '*' ];
    $operation = $operations[array_rand($operations)];

    $expression = "$a $operation $b";
    $correctAnswer = eval("return ($expression);");

    return [ $expression, "$correctAnswer" ];
}

function runGame()
{
    run(
        'What is the result of the expression?',
        __NAMESPACE__ . '\buildQuestionCallback'
    );
}
