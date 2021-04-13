<?php

namespace App\Repositories\Persons;

use App\Models\Person;
use Medoo\Medoo;

class MYSQLPersonsRepository implements PersonsRepository
{
    private Medoo $database;

    public function __construct()
    {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'codelex',
            'server' => 'localhost',
            'username' => '',
            'password' => ''
        ]);
    }

    public function save(Person $person): void
    {
        $this->database->insert("Registry", $person->toArray());
    }

    public function getPersons(string $searchField, string $textInput): array
    {

        return $this->database->select("Registry", [
            "id",
            "name",
            "surname",
            "age",
            "address",
            "description"
        ], [
            "{$searchField}[~]" => $textInput
        ]);
    }

    public function deletePerson(string $id): void
    {
        $this->database->delete("Registry", [
            "AND" => [
                "id" => $id,
            ]
        ]);
    }

    public function executeDescription(array $idDescription): void
    {
        $this->database->update("Registry", [
            "description" => $idDescription[0]
        ], [
            "id[=]" => $idDescription[1]
        ]);
    }

    public function getPerson(string $textInput): array
    {
        return $this->database->select("Registry", [
            "id",
            "name",
            "surname",
            "age",
            "address",
            "description"
        ], [
            "id[=]" => $textInput
        ]);
    }
}