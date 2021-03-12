<?php

namespace FlowerStore;

interface iWarehouse
{

    public function getAllStock(): ProductCollection;

    public function setAmount(string $name, int $howMuch): int;

}