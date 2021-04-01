<?php

namespace App\Services;

use App\Models\Person\Person;
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
            $request->description()
        );
            $this->personsRepository->save($person);
    }

    public function executeSearch(): PersonsCollection
    {
        $collection = new PersonsCollection();
        foreach ($this->personsRepository->getPersons() as $person) {
            $collection->add(new Person(
                $person["id"],
                $person["name"],
                $person["surname"],
                $person["description"]
            ));
        }
        return $collection;
    }
}