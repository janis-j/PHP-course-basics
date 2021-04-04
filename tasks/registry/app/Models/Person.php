<?php

namespace App\Models;

class Person
{
    private string $id;
    private string $name;
    private string $surname;
    private int $age;
    private string $address;
    private string $description;

    public function __construct(
        string $id,
        string $name,
        string $surname,
        int $age,
        string $address,
        string $description
    )
    {
        $this->setId($id);
        $this->setName($name);
        $this->setSurname($surname);
        $this->setAge($age);
        $this->setAddress($address);
        $this->setDescription($description);
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

    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    private function setAddress(string $address)
    {
        $this->address = $address;
    }

    private function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function surname(): string
    {
        return $this->surname;
    }

    public function age(): int
    {
        return $this->age;
    }

    public function address(): string
    {
        return $this->address;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function toArray(): array
    {
        return [
            "id" => $this->id(),
            "name" => $this->name(),
            "surname" => $this->surname(),
            "age" => $this->age(),
            "address" =>$this->address(),
            "description" => $this->description(),
        ];
    }
}