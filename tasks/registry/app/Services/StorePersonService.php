<?php

namespace App\Services;

use App\Models\Person;
use App\Models\PersonsCollection;
use App\Repositories\Persons\PersonsRepository;

class StorePersonService
{
    private PersonsRepository $personsRepository;

    public function __construct(PersonsRepository $personsRepository)
    {
        $this->personsRepository = $personsRepository;
    }

    public function executeStore(StorePersonRequest $request): void
    {
        $person = new Person(
            $request->id(),
            $request->name(),
            $request->surname(),
            $request->age(),
            $request->address(),
            $request->description()
        );
            $this->personsRepository->save($person);
    }

    public function executeSearch(string $searchField, string $textInput): PersonsCollection
    {
        $collection = new PersonsCollection();
        foreach ($this->personsRepository->getPersons($searchField, $textInput) as $person) {
            $collection->add(new Person(
                $person["id"],
                $person["name"],
                $person["surname"],
                $person["age"],
                $person["address"],
                $person["description"]
            ));
        }
        return $collection;
    }
}