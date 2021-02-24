<?php

class RollTwoDice
{
    private array $table;

    function __construct(array $table)
    {
        $this->table = $table;
    }

    function rollTheDice(): void
    {
        $this->table = [rand(1, 6),
            rand(1, 6)];
    }

    function ifEqualWithDesirable(int $desiredSum): bool
    {
        return $desiredSum === array_sum($this->table);
    }

    function getTable(): string
    {
        return $this->table[0] . " and " . $this->table[1] . " = " .
            array_sum($this->table) . PHP_EOL;
    }
}

$table = new RollTwoDice([]);

$desiredSum = readline("Input desirable sum of points: ");

echo "Desired sum: $desiredSum" . PHP_EOL;

while (!$table->ifEqualWithDesirable($desiredSum)) {
    $table->rollTheDice();
    echo $table->getTable();
}
