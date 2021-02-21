<?php

class Geometry
{
    static function calculateCircleArea(): float
    {
        $circleRadius = readline("Please enter circle radius: ");
        return round(3.14 * $circleRadius ** 2, 2);
    }

    static function calculateRectangleArea(): float
    {
        $rectangleLength = readline("Please enter rectangle length: ");
        $rectangleHeight = readline("Please enter rectangle height: ");
        return round($rectangleLength * $rectangleHeight, 2);
    }

    static function calculateTriangleArea(): float
    {
        $triangleBase = readline("Please enter triangle base: ");
        $triangleHeight = readline("Please enter triangle height: ");
        return round($triangleBase * $triangleHeight * 0.5, 2);
    }
    static function cls()
    {
        print("\033[2J\033[;H");
    }
}

echo "Geometry Calculator" . PHP_EOL;
echo "1. Calculate the Area of a Circle" . PHP_EOL;
echo "2. Calculate the Area of a Rectangle" . PHP_EOL;
echo "3. Calculate the Area of a Triangle" . PHP_EOL;
echo "4. Quit" . PHP_EOL;

$validMoves =
    [
        1, 2, 3, 4
    ];

$ifValidMove = false;

while (!$ifValidMove) {
    $userChoice =(int) readline("Enter your choice (1-4) : " . PHP_EOL);
    if (!in_array($userChoice, $validMoves)) {
        Geometry::cls();
        echo "ERROR! Enter your choice (1-4) :";
    } else if ($userChoice === 1) {
        Geometry::cls();
        echo "Area of Circle is: " . Geometry::calculateCircleArea() . PHP_EOL;
        $ifValidMove = true;
    } else if ($userChoice === 2) {
        Geometry::cls();
        echo "Area of Rectangle is: " . Geometry::calculateRectangleArea() . PHP_EOL;
        $ifValidMove = true;
    } else if ($userChoice === 3) {
        Geometry::cls();
        echo "Area of Triangle is: " . Geometry::calculateTriangleArea() . PHP_EOL;
        $ifValidMove = true;
    }else if ($userChoice = 4){
        Geometry::cls();
        exit("Bye". PHP_EOL);
    }
}
