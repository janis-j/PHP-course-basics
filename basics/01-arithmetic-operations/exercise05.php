<?php

$thinkingOfNumber = rand(1, 100);
$rightGuess = false;
$validGuess = [];

for ($i = 1; $i <= 100; $i++) {
    array_push($validGuess, $i);
}

while (!$rightGuess) {
    $guess = (int)readline("I'm thinking of a number between 1-100.  Try to guess it: " . PHP_EOL);
    if (!in_array($guess, $validGuess)) {
        echo "Guess number between 1-100" . PHP_EOL;
        continue;
    } else if ($guess > $thinkingOfNumber) {
        echo "Sorry, you are too high.  I was thinking of $thinkingOfNumber" . PHP_EOL;
        exit("Bye!") . PHP_EOL;
    } else if ($guess < $thinkingOfNumber) {
        echo "Sorry, you are too low.  I was thinking of $thinkingOfNumber" . PHP_EOL;
        exit("Bye!") . PHP_EOL;
    } else if ($guess === $thinkingOfNumber) {
        $rightGuess = true;
        echo "You guessed it!  What are the odds?!?" . PHP_EOL;
        exit("Bye!") . PHP_EOL;
    }
}
