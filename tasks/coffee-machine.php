<?php

$wallet = [
    200 => 2,
    100 => 1,
    50 => 2,
    20 => 3,
    10 => 2,
    5 => 2,
    2 => 3,
    1 => 6,
];

$coffeeTypes = [
    "Black coffee",
    "White coffee",
    "Coffee latte"
];

$coffeePrices = [
    1.80,
    2.40,
    2.10,
];

$changeInCoins = [];

function ifPickedRightOption(int $userInput): bool
{
    return in_array($userInput, [0, 1, 2]);
}

function ifInputCoinsValidAndEnough(array $coinsInputArray): bool
{
    $i = true;
    foreach ($coinsInputArray as $coin) {
        {
            $i = in_array($coin, [1, 2, 5, 10, 20, 50, 100, 200]);
        }
    }
    return $i;
}

function ifEnoughMoneyInWallet(array $coinsInputArray, array $wallet, array $coffeePrices, int $witchCoffee): string
{
    if ($coffeePrices[$witchCoffee] * 100 > array_sum($coinsInputArray)) {
        return "false";
    } else {
        $tempWallet = $wallet;
        foreach ($coinsInputArray as $coin) {
            if ($tempWallet[$coin] > 0) {
                $tempWallet[$coin] -= 1;
            } else {
                return $coin;
            }
        }
        return "true";
    }
}

function takeMoneyOutFromWallet(array $coinsInputArray, array &$wallet): void
{
    foreach ($coinsInputArray as $coins) {
        $wallet[$coins] -= 1;
    }
}

function ifNeedToGiveChange(array $coinsInputArray, array $coffeePrices, int $witchCoffee, array &$wallet, array &$changeInCoins): void
{
    $change = array_sum($coinsInputArray) - $coffeePrices[$witchCoffee] * 100;
    while ($change > 0) {
        foreach ($wallet as $coin => $count) {
            if ($change < $coin || $wallet[$coin] < 0) {
                continue;
            } else {
                $coinQuantity = intdiv($change,$coin);
                $change -= $coin*$coinQuantity;
                $wallet[$coin] += $coinQuantity;
                array_push($changeInCoins, str_repeat("$coin ", $coinQuantity));
            }
        }
    }
}

function sumOfMoneyInWallet(array $wallet): float
{
    $sum = 0.00;
    foreach ($wallet as $coin => $count) {
        $sum += $coin * $count;
    }
    return $sum / 100;
}

while (true) {
    foreach ($coffeeTypes as $key => $coffee) {
        echo "[$key] $coffee: " . sprintf('%.2f', $coffeePrices[$key]) . "€" . PHP_EOL;
    }
    $witchCoffee = (int)readline("Choose from menu: " . PHP_EOL);

    if (ifPickedRightOption($witchCoffee)) {
        print("\033[2J\033[;H");
        echo "You picked: $coffeeTypes[$witchCoffee]" . PHP_EOL;
        echo "Money in wallet: " . sumOfMoneyInWallet($wallet) . "€" . PHP_EOL;
        echo "Coin input --> coin 'space' coin 'space' ...." . PHP_EOL;
        $youHaveToPay = readline("You have to pay " . (sprintf('%.2f', $coffeePrices[$witchCoffee])) . '€: ');
        $coinsInputArray = explode(' ', $youHaveToPay);

        if (ifInputCoinsValidAndEnough($coinsInputArray)) {
            if (ifEnoughMoneyInWallet($coinsInputArray, $wallet, $coffeePrices, $witchCoffee) === "true") {
                print("\033[2J\033[;H");
                takeMoneyOutFromWallet($coinsInputArray, $wallet);
                ifNeedToGiveChange($coinsInputArray, $coffeePrices, $witchCoffee, $wallet, $changeInCoins);
                echo "Your change (coins): " . implode(' ', $changeInCoins) . " ,in TOTAL: "
                    . (sprintf('%.2f', array_sum($coinsInputArray) / 100 - $coffeePrices[$witchCoffee])) . "€" . PHP_EOL;
                echo "Money in wallet: " . sumOfMoneyInWallet($wallet) . "€" . PHP_EOL;
                exit("Thank you, Enjoy!" . PHP_EOL);
            } else if (ifEnoughMoneyInWallet($coinsInputArray, $wallet, $coffeePrices, $witchCoffee) === "false") {
                print("\033[2J\033[;H");
                echo "Sorry, insufficient funds!" . PHP_EOL;
            } else {
                print("\033[2J\033[;H");
                echo "You don't have enough " . ifEnoughMoneyInWallet($coinsInputArray, $wallet, $coffeePrices, $witchCoffee)
                    . " cent coins in your wallet.. try again!" . PHP_EOL;
                exit("Bye!" . PHP_EOL);
            }
        } else {
            echo "There was unreadable coin, try again!" . PHP_EOL;
        }
    } else {
        echo "Pick number from table!" . PHP_EOL;
    }
}


