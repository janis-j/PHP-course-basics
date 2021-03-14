<?php

namespace RacingApp;

class RacersCollection

{
    private array $movable;

    private function addRacer(Racer $racer)
    {
        $this->movable[] = $racer;
    }

    public function addFewRacers(array $collectionOfRacers)
    {
        foreach ($collectionOfRacers as $racer) {
            $this->addRacer($racer);
        }
    }

    public function getRacersCollection(): array
    {
        return $this->movable;
    }
}