<?php

namespace RacingApp;

use RacingApp\vehicle\iVehicle;

class Racer
{
    private iVehicle $vehicle;
    private string $name;
    private array $crashCo;
    private bool $finished = false;
    private string $startNumber;

    public function __construct(iVehicle $vehicle, string $name, string $startNumber, array $crashCo)
    {
        $this->vehicle = $vehicle;
        $this->name = $name;
        $this->startNumber = $startNumber;
        $this->crashCo = $crashCo;
    }

    public function startNumber(): string
    {
        return $this->startNumber;
    }

    public function setFinished(): void
    {
        $this->finished = true;
    }

    public function getIfFinished(): bool
    {
        return $this->finished;
    }

    public function getCrashCo(): array
    {
        return $this->crashCo;
    }

    public function setStartNumber(): void
    {
        $this->startNumber = 'X';
    }

    public function vehicle(): iVehicle
    {
        return $this->vehicle;
    }

    public function name(): string
    {
        return $this->name;
    }
}