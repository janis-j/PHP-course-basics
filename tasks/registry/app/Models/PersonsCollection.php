<?php

namespace App\Models;

use App\Models\Person\Person;

class PersonsCollection
{
    private array $collection;

    public function collection(): array
    {
        return $this->collection;
    }

    public function add(Person $person): void
    {
        $this->collection[] = $person;
    }
}