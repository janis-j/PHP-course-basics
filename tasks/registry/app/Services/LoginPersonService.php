<?php

namespace App\Services;

use App\Repositories\Persons\PersonsRepository;

class LoginPersonService
{
    private PersonsRepository $personsRepository;

    public function __construct(PersonsRepository $personsRepository)
    {
        $this->personsRepository = $personsRepository;
    }

    public function execute(string $textInput): bool
    {
      $person = $this->personsRepository->getPerson($textInput);

      return !empty($person);
    }
}