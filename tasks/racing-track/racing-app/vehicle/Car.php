<?php

namespace RacingApp\vehicle;

class Car implements iVehicle
{
    private string $make;
    private array $speed;
    private array $coordinates;

    public function __construct(string $make, array $speed, array $coordinates)
    {
        $this->make = $make;
        $this->speed = $speed;
        $this->coordinates = $coordinates;
    }

    public function make(): string
    {
        return $this->make;
    }

    public function speed(): array
    {
        return $this->speed;
    }

    public function coordinates():array
    {
        return $this->coordinates;
    }

    public function addYCoordinate(int $trackLength, bool $ifFinished): void
    {
        if(!$ifFinished) {
            $tempInteger = random_int($this->speed[0], $this->speed[1]);
            if ($this->coordinates[1] + $tempInteger > $trackLength) {
                $this->coordinates[1] += $trackLength - $this->coordinates[1];
            } else {
                $this->coordinates[1] += $tempInteger;
            }
        }
    }

    public function getCoordinates(): array
    {
        return [$this->coordinates[0], $this->coordinates[1]];
    }
}