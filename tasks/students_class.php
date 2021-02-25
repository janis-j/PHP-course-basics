<?php

class Student
{
    public string $name;
    public string $surname;
    public int $age;
    public int $grade;

    function __construct(string $name, string $surname, string $age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->setGrade($this->age);
    }

    function setGrade(int $age)
    {
        switch ($age) {
            case 7:
                $this->grade = 1;
                break;
            case 8:
                $this->grade = 2;
                break;
            case 9:
                $this->grade = 3;
                break;
            case 10:
                $this->grade = 4;
                break;
            case 11:
                $this->grade = 5;
                break;
            case 12:
                $this->grade = 6;
                break;
        }
    }
}

class School
{
    private array $student;

    function __construct()
    {
        $this->student = [];
    }

    function addStudent(string $name, string $surname,int $grade){
        $student = new Student($name,$surname,$grade);
        array_push($this->student, $student);
    }

}

$school = new School();
$school->addStudent('John', "Doe", 7);
$school->addStudent('Rita', "King", 7);
$school->addStudent('Dzhosh', "Zingermann", 8);
$school->addStudent('Sandra', "Shmitz", 7);



