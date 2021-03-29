<?php

namespace App\Models;

require_once '../vendor/autoload.php';

use App\Models\Person\Person;
use Medoo\Medoo;

class Registry
{
    private array $personsCollection = [];
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

    public function search(): void
    {
        if(isset($_POST['radioInput'])){
            $persons = $this->database->select("Registry", [
                "id",
                "name",
                "surname",
                "description"
            ], [
                "{$_POST['radioInput']}[=]" => $_POST['textInput']
            ]);
            foreach ($persons as $person) {
                $this->personsCollection[] = new Person(
                    $person["id"],
                    $person["name"],
                    $person["surname"],
                    $person["description"]
                );
            }
       }
    }

    public function collection(): array
    {
        return $this->personsCollection;
    }

    public function removeFromDb()
    {
        if(isset($_POST["deleted"])) {
            $this->database->delete("Registry", [
                "AND" => [
                    "id" => $_POST["pickPerson"],
                ]
            ]);
        }
    }

    public function changeDescriptionInDb(): void
    {
        if(isset($_POST["submitted"])) {
            $this->database->update("Registry", [
                "description" => $_POST["descriptionInput"]
            ], [
                "id[=]" => $_POST["pickPerson"]
            ]);
        }
    }

    public function insertNewPerson()
    {
        if (isset($_POST["newPersonInput"])) {
            $this->database->insert("Registry", [
                "id" => $_POST["id"],
                "name" => $_POST["name"],
                "surname" => $_POST["surname"],
                "description" => $_POST["description"]
            ]);
        }
    }
}

