<?php

class Date
{
    private int $day;
    private int $month;
    private int $year;

    public function __construct(int $day, int $month, int $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function setDay(int $date): void
    {
        $this->day = $date;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setMonth(int $month): void
    {
        $this->month = $month;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setDate(string $date): void{
        $tempArray = explode(' ', $date);
        $this->setDay((int) $tempArray[0]);
        $this->setMonth((int) $tempArray[1]);
        $this->setYear((int) $tempArray[2]);
    }

    public function getDate(): string
    {
        return sprintf('%02d',$this->day) . "/" . sprintf('%02d',$this->month)
            . "/" . sprintf('%04d',$this->year);
    }
}

$date = new Date (0,0,0);

while(true) {
    print("\033[2J\033[;H");
    echo $date->getDate() . PHP_EOL;
    echo "[0] set day" . PHP_EOL;
    echo "[1] set month" . PHP_EOL;
    echo "[2] set year" . PHP_EOL;
    echo "[3] set date" . PHP_EOL;
    $userInput = (int) readline("Pick one: ");
    switch($userInput){
        case 0:
            $input = (int) readline("Input date: ");
            $date->setDay($input);
            break;
        case 1:
            $input = (int) readline("Input month: ");
            $date->setMonth($input);
            break;
        case 2:
            $input = (int) readline("Input year: ");
            $date->setYear($input);
            break;
        case 3:
            $input = (string) readline("Input Date (dd yy mmmm): ");
            $date->setDate($input);
            break;
        default: echo "Pick from a list!";
    }

}