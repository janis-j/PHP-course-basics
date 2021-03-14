<?php

namespace RacingApp\vehicle;

interface iVehicle
{
    public function make(): string;
    public function speed(): array;
    public function coordinates():array;
    public function addYCoordinate(int $trackLength, bool $ifFinished): void;
    public function getCoordinates(): array;
}