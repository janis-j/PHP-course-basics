<?php

$items =
    [
        "rock",
        "paper",
        "scissors"
    ];

$validMoves =
    [
        0,
        1,
        2
    ];

$winnCases =
    [
        0 => 2,
        1 => 0,
        2 => 1
    ];

echo "select you're item:" . PHP_EOL;
foreach ($items as $key => $item) {
    echo "$key: $item" . PHP_EOL;
}

$personMove = null;
$pcMove = array_rand($validMoves, 1);
$trueFalse = false;

while (!$trueFalse) {
    $personMove = readline("make move:");
    if (in_array($personMove, $validMoves)) {
        $trueFalse = true;
    }
    echo "try again, valid moves are: 0  1  2" . PHP_EOL;
}

function showWhatIsPicked(array $items, int $keyOfItem): string
{
    return $items[$keyOfItem];
}

echo "YOU: " . showWhatIsPicked($items, $personMove) . " --> <-- " . showWhatIsPicked($items, $pcMove) . " :PC" . PHP_EOL;

echo checkWinner($personMove, $pcMove, $winnCases);

function checkWinner(int $personMove, int $pcMove, array $winnCases): string
{
    if ($personMove === $pcMove) {
        return "It's a tie" . PHP_EOL;
    } else foreach ($winnCases as $winner => $looser) {
        if ($winner === $personMove && $looser === $pcMove) {
            return "Congrats! You WON!!!" . PHP_EOL;
        } else if ($winner === $pcMove && $looser === $personMove) {
            return "Sorry, you LOST!!!" . PHP_EOL;
        }
    }
}


