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
            'username' => 'janis',
            'password' => 'Maximus21@'
        ]);
    }

    public function save(Person $person): void
    {
        $this->database->insert("Registry", $person->toArray());
    }

    public function getPersons(): array
    {

        return $this->database->select("Registry", [
            "id",
            "name",
            "surname",
            "age",
            "address",
            "description"
        ], [
            "{$_POST['radioInput']}[~]" => $_POST['textInput']
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
}