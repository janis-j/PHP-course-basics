<?php

class Student
{
    private string $name;
    private int $age;
    private int $grade;

    function __construct(string $name, string $age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->calculateGrade($this->age);
    }

    function getName(): string{
        return $this->name;
    }

    function setGrade(int $grade): void
    {
        $this->grade = $grade;
    }

    function getGrade(): int
    {
        return $this->grade;
    }

    function calculateGrade(int $age): void
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
    private array $students = [];

    function addStudent(Student $student): void
    {
        $this->students[] = $student;
    }

    function addFewStudents(array $students): void
    {
        foreach ($students as $student) {
            $this->addStudent($student);
        }
    }

    function getSpecificGrade(int $grade): array
    {
        $tempArray = [];
        foreach ($this->students as $index => $student) {
            if ($student->getGrade() === $grade) {
                array_push($tempArray, $student);
            }
        }
        return $tempArray;
    }

    function getAllStudents(): array
    {
        return $this->students;
    }
}
$john = new Student('John', 7);
$school = new School();
$school->addStudent($john);
$school->addFewStudents([new Student('Rita', 7),
    new Student('Dzhosh', 8),
    new Student('Sandra', 7)
]);

$john->setGrade(2);

foreach($school->getAllStudents() as $student){
    echo $student->getName() . ' ' . $student->getGrade() . PHP_EOL;
}


foreach($school->getSpecificGrade(2) as $student){
    echo $student->getName() . ' ' . $student->getGrade() . PHP_EOL;
}

