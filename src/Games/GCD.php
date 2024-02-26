<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\run;

use const BrainGames\Engine\MAX_RANDOM_NUMBER;

function calcGCD(int $a, int $b): int
{
    while ($a !== 0 && $b !== 0) {
        if ($a > $b) {
            $a %= $b;
        } else {
            $b %= $a;
        }
    }
    return $a + $b;
}

function buildQuestionCallback(): array
{
    $a = rand(1, MAX_RANDOM_NUMBER);
    $b = rand(1, MAX_RANDOM_NUMBER);

    $question = "$a $b";
    $correctAnswer = calcGCD($a, $b);

    return [ $question, "$correctAnswer" ];
}

function runGame()
{
    run(
        'Find the greatest common divisor of given numbers.',
        __NAMESPACE__ . '\buildQuestionCallback'
    );
}
