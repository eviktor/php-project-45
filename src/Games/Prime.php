<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;

use const BrainGames\Engine\MAX_RANDOM_NUMBER;

function isPrime($number)
{
    if ($number === 1) {
        return false;
    }
    if ($number === 2) {
        return true;
    }
    if ($number % 2 === 0) {
        return false;
    }

    for ($i = 3, $maxFactor = (int)sqrt($number); $i <= $maxFactor; $i += 2) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
function buildQuestionCallback(): array
{
    $random = rand(1, MAX_RANDOM_NUMBER);

    $question = "$random";
    $correctAnswer = isPrime($random) ? 'yes' : 'no';

    return [ $question, $correctAnswer ];
}

function runGame()
{
    run(
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        __NAMESPACE__ . '\buildQuestionCallback'
    );
}
