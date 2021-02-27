<?php

class SlotMachine
{
    private array $figures = ["B", "A", "X"];
    private array $points = [10, 15, 20];
    private int $score = 0;
    private array $matrix = [];
    private int $bet = 1;
    private int $wallet = 2000;
    private int $bonusGame = 0;

    public function addFigures(string $figure, int $points)
    {
        array_push($this->figures, $figure);
        array_push($this->points, $points);
    }

    public function printMatrix(): array
    {
        $this->score = 0;
        $this->matrix = [];
        for ($i = 0; $i < 3; $i++) {
            $tempArray = [];
            for ($j = 0; $j < 3; $j++) {
                $randomNum = rand(0, count($this->figures)-1);
                array_push($tempArray, $this->figures[$randomNum]);
            }
            array_push($this->matrix, $tempArray);
        }
        return $this->matrix;
    }

    public function checkCombinations(): void
    {
        $winningCombinations = [
            [[0, 0], [0, 1], [0, 2]],
            [[1, 0], [1, 1], [1, 2]],
            [[2, 0], [2, 1], [2, 2]],
            [[0, 0], [1, 1], [2, 2]],
            [[0, 2], [1, 1], [2, 0]],
        ];

        foreach ($winningCombinations as $eachCombination) {
            $winningSymbol = '';
            if ($this->matrix[$eachCombination[0][0]][$eachCombination[0][1]] === $this->matrix[$eachCombination[1][0]][$eachCombination[1][1]] &&
                $this->matrix[$eachCombination[0][0]][$eachCombination[0][1]] === $this->matrix[$eachCombination[2][0]][$eachCombination[2][1]] &&
                $this->matrix[$eachCombination[1][0]][$eachCombination[1][1]] === $this->matrix[$eachCombination[2][0]][$eachCombination[2][1]]) {
                $winningSymbol = $this->matrix[$eachCombination[0][0]][$eachCombination[0][1]];
                foreach ($this->figures as $key => $figure) {
                    $pointsToAdd = $this->points[$key] * $this->bet / 10;
                    if ($winningSymbol === $figure && $winningSymbol !== "X") {
                        $this->score += $pointsToAdd;
                        $this->wallet += $pointsToAdd;
                    }else if ($winningSymbol === "X") {
                        $this->bonusGame = 6;
                        $this->score += $pointsToAdd;
                        $this->wallet += $pointsToAdd;
                    }
                }
            }
        }
        if ($this->bonusGame > 0) {
            $this->bonusGame --;
        }else{
            $this->wallet -= $this->bet;
        }

    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function getWallet(): int
    {
        return $this->wallet;
    }

    public function setBet(int $bet): void
    {
        $this->bet = $bet;
    }

    public function decrementWallet(): void
    {
        $this->wallet -= $this->bet;
    }

    public function getHowManyBonusGamesLeft(): int
    {
        return $this->bonusGame;
    }
}

$game = new SlotMachine();
$continue = true;
while (true) {
    print("\033[2J\033[;H");
    $continue = true;
    echo "Score: " . $game->getScore() . PHP_EOL;
    echo "Wallet: " . $game->getWallet() . PHP_EOL;
    $inputBet = readline("Input bet: ");
    $game->setBet($inputBet);
    if (in_array($inputBet, [10, 20, 30])) {
        while ($continue) {
            print("\033[2J\033[;H");
            foreach ($game->printMatrix() as $lines) {
                foreach ($lines as $figure) {
                    echo $figure . '  ';
                }
                echo PHP_EOL;
                sleep(1);
            }
            $game->checkCombinations();
            echo "Score: " . $game->getScore() . PHP_EOL;
            echo "Wallet: " . $game->getWallet() . PHP_EOL;
            if($game->getHowManyBonusGamesLeft() > 0) {
                echo "!!BONUS GAME!!! " . $game->getHowManyBonusGamesLeft() . " left" . PHP_EOL;
            }
            $continueExit = (int) readline("Exit->[1]   Raise a bet->[2]   continue->[0] : ");
            switch ($continueExit) {
                case 0:
                    break;
                case 1:
                    exit("Bye!!");
                case 2:
                    $continue = false;
                    break;
            }
        }
    }
}
