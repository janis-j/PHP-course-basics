<?php
$hanger = [
    '   +-----+',
    '   |     |',
    '   0     |',
    '  /|\    |',
    '  / \    |',
    ' ________|'
];

$arrayToDisplay = [
    " ",
    " ",
    " ",
    " ",
    " ",
    " ",
    "<==================================>"
];

$lineToPushIn = 5;

$wordToGuess = [
    ["b ", "a ", "l ", "l ", "o ", "o ", "n "],
    ["h ", "i ", "p ", "p ", "o ", "t ", "o ", "t ", "a ", "m ", "u ", "s "],
    ["d ", "i ", "s ", "p ", "l ", "a ", "y "],
    ["k ", "i ", "n ", "g "]
];

$randomNum = rand(0, 3);

$wordToGuessHidden = array_fill(0, count($wordToGuess[$randomNum]), "_ ");

function fillGuessedLetters(array $wordToGuess, array &$wordToGuessHidden, string $letterGuess, int $randomNum): void
{
    for ($i = 0; $i < count($wordToGuess[$randomNum]); $i++) {
        if ($wordToGuess[$randomNum][$i] === $letterGuess . " ") {
            $wordToGuessHidden[$i] = $letterGuess . " ";
        }
    }
}

function checkIfWordIsGuessed(array $wordToGuessHidden): bool
{
    return in_array('_ ', $wordToGuessHidden);
}

while (true) {
    print("\033[2J\033[;H");
    echo "<==================================>" . PHP_EOL;
    echo "Word:     ";
    foreach ($wordToGuessHidden as $letter) {
        echo $letter;
    };
    echo PHP_EOL;
    foreach ($arrayToDisplay as $key => $line) {
        echo $line . PHP_EOL;
    }
    if (checkIfWordIsGuessed($wordToGuessHidden)) {
        $letterGuess = strtolower(readline("Guess: "));
        if (in_array($letterGuess . " ", $wordToGuess[$randomNum])) {
            fillGuessedLetters($wordToGuess, $wordToGuessHidden, $letterGuess, $randomNum);
        } else {
            $arrayToDisplay[$lineToPushIn] = $hanger[$lineToPushIn];
            $lineToPushIn -= 1;
        }
    } else {
        echo "Nice, you won! ";
        $restartOrQuit = readline("Play 'again' or 'quit'?");
        if ($restartOrQuit === 'again') {
            $randomNum = rand(0, 3);
            $wordToGuessHidden = array_fill(0, count($wordToGuess[$randomNum]), "_ ");
            $arrayToDisplay = [
                " ",
                " ",
                " ",
                " ",
                " ",
                " ",
                "<==================================>"
            ];
        } else if ($restartOrQuit === 'quit') {
            exit("Bye!" . PHP_EOL);
        }
    }
}


