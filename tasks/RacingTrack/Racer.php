<?php


class Racer
{
    private string $startNumber;
    private int $xCoord;
    private int $yCoord;
    private array $minMaxSpeed;
    private array $crashCo;
    private bool $finished = false;

    public function __construct(int $startNumber, int $xCoord, int $yCoord, array $minMaxSpeed, array $crashCo)
    {
        $this->startNumber = $startNumber;
        $this->xCoord = $xCoord;
        $this->yCoord = $yCoord;
        $this->minMaxSpeed = $minMaxSpeed;
        $this->crashCo = $crashCo;
    }

    public function addYCoord(int $trackLength): void
    {
        if(!$this->finished) {
            $tempInteger = random_int($this->minMaxSpeed[0], $this->minMaxSpeed[1]);
            if ($this->yCoord + $tempInteger > $trackLength) {
                $this->yCoord += $trackLength - $this->yCoord;
            } else {
                $this->yCoord += $tempInteger;
            }
        }
    }

    public function getCoordinates(): array
    {
        return [$this->xCoord, $this->yCoord];
    }

    public function getRacersNumber(): string
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

    public function setStartNumber()
    {
        $this->startNumber = 'X';
    }

}