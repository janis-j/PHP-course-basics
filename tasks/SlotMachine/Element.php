<?php

class Element
{
    private string $symbol;
    private int $reward;

    public function __construct(string $symbol, int $reward)
    {
        $this->reward = $reward;
        $this->symbol = $symbol;
    }

    public function symbol(): string
    {
        return $this->symbol;
    }

    public function getReward(): int
    {
        return $this->reward;
    }

    public function __toString(): string
    {
        return $this->symbol();
    }
}