<?php

namespace App\Repositories\Persons;

use App\Models\Person;

interface PersonsRepository
{
    public function save(Person $person): void;

    public function getPersons(): array;

    public function deletePerson(string $id): void;

    public function executeDescription(array $idDescription): void;
}