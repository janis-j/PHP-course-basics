<?php

class Point
{
    private int $xCoordinate;
    private int $yCoordinate;

    function __construct(int $x, int $y)
    {
        $this->xCoordinate = $x;
        $this->yCoordinate = $y;
    }

    function getX(): int
    {
        return $this->xCoordinate;
    }

    function getY(): int
    {
        return $this->yCoordinate;
    }

    static function swapPoints(Point $pointOne, Point $pointTwo): array
    {
        return ["(" . $pointTwo->getX() . ", " . $pointTwo->getY() . ")",
                "(" . $pointOne->getX() . ", " . $pointOne->getY() . ")"];
    }
}

$pointOne = new Point(5, 2);
$pointTwo = new Point(-3, 6);

$swappedPoints = Point :: swapPoints($pointOne,$pointTwo);

foreach ($swappedPoints as $swappedPoint){
    echo $swappedPoint . PHP_EOL;
}