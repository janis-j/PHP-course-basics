<?php


namespace App\Services;


class StorePersonRequest
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

        $this->id = $id;
        $this->setName($name);
        $this->setSurname($surname);
        $this->age = $age;
        $this->address = $address;
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



    private function setName(string $name)
    {
        $toLower = mb_strtolower($name);
        $this->name = mb_strtoupper(substr($toLower,0,1)) . substr($toLower,1);
    }

    private function setSurname(string $surname)
    {
        $toLower = mb_strtolower($surname);
        $this->surname = mb_strtoupper(substr($toLower,0,1)) . substr($toLower,1);
    }
}