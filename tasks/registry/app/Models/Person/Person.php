<?php

namespace App\Models\Person;

class Person
{
    private string $id;
    private string $name;
    private string $surname;
    private string $description;

    public function __construct(string $id, string $name, string $surname, string $description)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setSurname($surname);
        $this->description = $description;
    }

    private function setId(string $id): void
    {
        $this->id = str_replace( '-','',$id);
    }

    private function setName(string $name): void
    {
        $this->name = ucfirst(strtolower($name));
    }

    private function setSurname(string $surname): void
    {
        $this->surname = ucfirst(strtolower($surname));
    }

    public function id(): string
    {
        return "$this->id";
    }

    public function name(): string
    {
        return $this->name;
    }

    public function surname(): string
    {
        return $this->surname;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function allInfo(): string
    {
        return "
            <td><form>
        <input type='radio' id='column1' name='pickPerson' value='$this->id'>
            <td>{$this->id}</td>
            <td>{$this->name}</td>
            <td>{$this->surname}</td>
            <td>{$this->description}</td>
        ";
    }

    public function toArray(): array
    {
         return [
             "id" => $this->id(),
             "name" => $this->name(),
             "surname" => $this->surname(),
             "description" => $this->description(),
         ];
    }
}