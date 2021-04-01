<?php

namespace App\Services;

use App\Repositories\Persons\PersonsRepository;

class DeleteChangePersonService
{
    private PersonsRepository $personsRepository;

    public function __construct(PersonsRepository $personsRepository)
    {
        $this->personsRepository = $personsRepository;
    }

    public function executeDelete(string $id): void
    {
        $this->personsRepository->deletePerson($id);
    }

    public function executeChange(array $idDescription): void
    {
        $this->personsRepository->executeDescription($idDescription);
    }
}