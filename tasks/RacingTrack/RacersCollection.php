<?php

class RacersCollection
{
    private array $movable;

    private function addObject(Racer $object)
    {
        $this->movable[] = $object;
    }

    public function addFewObjects(array $array)
    {
        foreach ($array as $object) {
            $this->addObject($object);
        }
    }

    public function getRacersCollection(): array
    {
        return $this->movable;
    }
}