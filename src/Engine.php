<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const DEFAULT_QUESTIONS_COUNT = 3;
const MAX_RANDOM_NUMBER = 100;

function showWelcomeMessage()
{
    line("Welcome to the Brain Games!");
}

function askNameAndGreet(): string
{
    $name = trim(prompt('May I have your name?'));
    line("Hello, $name!");
    return $name;
}

function askQuestion(string $question, string $correctAnswer): bool
{
    line("Question: $question");
    $answer = trim(strtolower(prompt('Your answer')));

    if ($answer === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        return false;
    }
}

function askQuestions(array $questions): bool
{
    foreach ($questions as [ $question, $correctAnswer ]) {
        if (!askQuestion($question, $correctAnswer)) {
            return false;
        }
    }
    return true;
}

function prepareQuestions(string $buildQuestionCallback): array
{
    $questions = [];
    for ($i = 0; $i < DEFAULT_QUESTIONS_COUNT; $i++) {
        $questions[] = call_user_func($buildQuestionCallback);
    }
    return $questions;
}

function run(string $gameDescription, string $buildQuestionCallback)
{
    showWelcomeMessage();
    $name = askNameAndGreet();
    line($gameDescription);

    if (askQuestions(prepareQuestions($buildQuestionCallback))) {
        line("Congratulations, $name!");
    } else {
        line("Let's try again, $name!");
    }
}
