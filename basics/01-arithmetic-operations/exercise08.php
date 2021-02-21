<?php

class Employee
{
    public string $name;
    public float $basePay;
    public int $hoursWorked;

    function __construct(string $name, float $basePay, int $hoursWorked)
    {
        $this->name = $name;
        $this->basePay = $basePay;
        $this->hoursWorked = $hoursWorked;
    }

    function ifHoursWorkedLimitExceeded(): bool
    {
        $hoursLimit = 60;
        return $this->hoursWorked > $hoursLimit;
    }

    function ifBasePayMoreThanMinWage(): bool
    {
        $minWage = 8.00;
        return $this->basePay > $minWage;
    }

    function wageCalculator(): string
    {
        if (!$this->ifHoursWorkedLimitExceeded() && $this->ifBasePayMoreThanMinWage()) {
            $baseHours = 40;
            if ($this->hoursWorked > 40) {
                return sprintf("%.2f", $baseHours * $this->basePay + ($this->hoursWorked - $baseHours) * ($this->basePay * 1.5)) . "$";
            } else {
                return sprintf("%.2f", $baseHours * $this->basePay) . "$";
            }
        }
        return "error";
    }
}

$employers = [
    $employer1 = new Employee ("John", 7.50, 35),
    $employer2 = new Employee ("Sarah", 8.20, 47),
    $employer3 = new Employee ("Peter", 10.00, 73),
];


$mask = "|%9s |%-8s | %-10s | %-8s |" . PHP_EOL;
printf($mask, 'Employee', 'Base Pay', 'Hrs Worked', 'Salary');
foreach ($employers as $employee) {
    printf($mask, $employee->name, $employee->basePay, $employee->hoursWorked, $employee->wageCalculator());
}
