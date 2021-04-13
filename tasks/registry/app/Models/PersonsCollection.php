<?php

namespace App\Models;

class PersonsCollection
{
    private array $collection =[];

    public function collection(): array
    {
        $personsList = [];
        foreach($this->collection as $person){
            $personsList[] = $person->toArray();
        }
        return $personsList;
    }

    public function add(Person $person): void
    {
        $this->collection[] = $person;
    }

    public function person(): Person
    {
        foreach($this->collection as $person){
            return $person;
        }
        exit;
    }
}