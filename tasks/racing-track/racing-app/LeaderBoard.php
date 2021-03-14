<?php

namespace RacingApp;

class LeaderBoard
{
    private array $leaderBoard = [];
    private array $crashedBoard = [];
    private int $timeLapse = 0;

    public function addFinished(Racer $racer): void
    {
        $this->leaderBoard[] = [$racer->name(), $racer->vehicle()->make(), $this->timeLapse];
    }

    public function addCrashed(Racer $racer): void
    {
        $this->crashedBoard[] = [$racer->name(), $racer->vehicle()->make()];
    }

    public function timeTick(): void
    {
        $this->timeLapse++;
    }

    public function getTime(): int
    {
        return $this->timeLapse;
    }

    public function leaderBoard(): array
    {
        return $this->leaderBoard;
    }

    public function crashedBoard(): array
    {
        return $this->crashedBoard;
    }
}