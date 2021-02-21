<?php

$matrix = [
    [' ', ' ', ' '],
    [' ', ' ', ' '],
    [' ', ' ', ' ']
];

$winningCombinations = [
    [[0, 0], [0, 1], [0, 2]],
    [[1, 0], [1, 1], [1, 2]],
    [[2, 0], [2, 1], [2, 2]],
    [[0, 0], [1, 0], [2, 0]],
    [[0, 1], [1, 1], [2, 1]],
    [[0, 2], [1, 2], [2, 2]],
    [[0, 0], [1, 1], [2, 2]],
    [[0, 2], [1, 1], [2, 0]],
];

function checkForWinner(array $winningCombinations, array $matrix): bool
{
    $winner = '';
    foreach ($winningCombinations as $eachCombination) {
        if ($matrix[$eachCombination[0][0]][$eachCombination[0][1]] === $matrix[$eachCombination[1][0]][$eachCombination[1][1]] &&
            $matrix[$eachCombination[0][0]][$eachCombination[0][1]] === $matrix[$eachCombination[2][0]][$eachCombination[2][1]] &&
            $matrix[$eachCombination[1][0]][$eachCombination[1][1]] === $matrix[$eachCombination[2][0]][$eachCombination[2][1]]) {
            $winner = $matrix[$eachCombination[0][0]][$eachCombination[0][1]];
        }
        if($winner === 'X' || $winner === 'O'){
            break;
        }
    }
    return $winner === 'X' || $winner === 'O';
}

function validateMove(string $input, $matrix, $location): bool
{
    $validMoves = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            array_push($validMoves, "$i $j");
        }
    }
    return in_array($input, $validMoves) && $matrix[$location[0]][$location[1]] === ' ';
}

function printMatrix(array $matrix): string
{
    return
        "{$matrix[0][0]} {$matrix[0][1]} {$matrix[0][2]}
{$matrix[1][0]} {$matrix[1][1]} {$matrix[1][2]}
{$matrix[2][0]} {$matrix[2][1]} {$matrix[2][2]}" . PHP_EOL;
}

function whenItsATie(array $matrix): bool{
    foreach ($matrix as $array)
    return in_array(' ', $array);
}

$whoGoesNext = 'X';

while (true) {
    if ($whoGoesNext === 'X') {
        $input = readline("'X', choose your location (row -> 'space' -> column): " . PHP_EOL);
        $location = explode(' ', $input);
        if (validateMove($input, $matrix, $location)) {
            print("\033[2J\033[;H");
            $matrix[$location[0]][$location[1]] = $whoGoesNext;
            echo printMatrix($matrix);
            if(checkForWinner($winningCombinations,$matrix)){
                echo "Winner is $whoGoesNext !!!" . PHP_EOL;
                exit("Bye!" . PHP_EOL);
            }else if(!whenItsATie($matrix)){
                echo "It's a tie!!!" . PHP_EOL;
                exit("Bye!" . PHP_EOL);
            }
            $whoGoesNext = "O";
        }
    } else {
        $input = readline("'O', choose your location (row -> 'space' -> column): " . PHP_EOL);
        $location = explode(' ', $input);
        if (validateMove($input, $matrix, $location)) {
            print("\033[2J\033[;H");
            $matrix[$location[0]][$location[1]] = $whoGoesNext;
            echo printMatrix($matrix);
            if(checkForWinner($winningCombinations,$matrix)){
                echo "Winner is $whoGoesNext !!!" . PHP_EOL;
                exit("Bye!" . PHP_EOL);
            }else if(!whenItsATie($matrix)){
                echo "It's a tie!!!" . PHP_EOL;
                exit("Bye!" . PHP_EOL);
            }
            $whoGoesNext = "X";
        }
    }
}



