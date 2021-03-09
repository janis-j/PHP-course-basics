<?php

interface iWarehouse
{
    public function addFewFlowers(array $flowers): void;

    public function getAmount(string $flowerName): int;

    public function setAmount(string $flowerName, int $amountToAdd): void;

    public function getAllStock(): array;

}