<?php

namespace BrainGames\BaseGame;

use function cli\line;
use function cli\prompt;

function askName(): string
{
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    return $name;
}

function askQuestion(string $question, string $correctAnswer): bool
{
    line("Question: $question");
    $answer = prompt('Your answer');

    $isCorrect = ($answer === $correctAnswer);
    if ($isCorrect) {
        line('Correct!');
    } else {
        line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
    }

    return $isCorrect;
}

function playGame(string $gameDescription, string $genQuestionCallback, int $winCount = 3)
{
    line("Welcome to the Brain Games!");
    $name = askName();
    line($gameDescription);

    $correctCount = 0;
    while ($correctCount < $winCount) {
        [ $question, $correctAnswer ] = call_user_func($genQuestionCallback);
        if (!askQuestion($question, $correctAnswer)) {
            break;
        }
        $correctCount++;
    }

    if ($correctCount < $winCount) {
        line("Let's try again, $name!");
    } else {
        line("Congratulations, $name!");
    }
}
