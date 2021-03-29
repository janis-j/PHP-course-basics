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
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->description = $description;
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
}