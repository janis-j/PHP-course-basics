<?php

class PigletGame
{
    private int $playerPoints;

    function __construct(int $playerPoints)
    {
        $this->playerPoints = $playerPoints;
    }

    function rollDice(): int
    {
        return rand(1, 6);
    }

    function countPoints(int $rolledPoints): void
    {
        $this->playerPoints += $rolledPoints;
    }

    function getPoints(): int
    {
        return $this->playerPoints;
    }
}

$player1 = new PigletGame(0);

echo "Welcome to Piglet!" . PHP_EOL;

while (true) {
    $rolledPoints = $player1->rollDice();
    if ($rolledPoints === 1) {
        echo "You rolled a 1!" . PHP_EOL;
        echo "You got 0 points." . PHP_EOL;
        exit("Bye");
    } else {
        echo "You rolled a $rolledPoints" . PHP_EOL;
        $player1->countPoints($rolledPoints);
        $rollAgain = strtolower(readline("Roll again (y/n)? "));
        if ($rollAgain === "n") {
            echo "You got " . $player1->getPoints() . " points." . PHP_EOL;
            exit("Bye!");
        } else {
            continue;
        }
    }
}