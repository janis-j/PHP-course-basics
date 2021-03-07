<?php


class Dogs
{
    private array $dogs = [];

    private function addDog(Dog $dog): void
    {
        $this->dogs[] = $dog;
    }

    public function addDogs(array $dogs): void
    {
        foreach ($dogs as $dog) {
            $this->addDog($dog);
        }
    }

    public function getDogs(): array
    {
        return $this->dogs;
    }

    public function hasSameMotherAs(Dog $dog, Dog $otherDog): bool
    {
            return $dog->getMothersName() === $otherDog->getMothersName();
    }

    public function getDogByName(string $dogsName): Dog
    {
        $tempArray = [];
        foreach ($this->dogs as $dog){
            if($dog->getName() === $dogsName)
                $tempArray = $dog;
        }
        return $tempArray;
    }
}