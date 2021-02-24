<?php

class NumberSquare{
    private int $min;
    private int $max;
    function __construct(int $min, int $max){
        $this->min = $min;
        $this->max = $max;
    }
    function getFirstLine(): string{
        $numberArray = [];
        for($i = $this->min; $i<=$this->max; $i++){
            array_push($numberArray,$i);
        }
        return implode($numberArray);
    }
    function turnAround($firstLine): string{
        return substr($firstLine,1,strlen($firstLine)-1) . substr($firstLine,0,1);
    }
    function getMax(): int{
        return $this->max;
    }
}
$minInput = readline("Input min: ");
$maxInput = readline("Input max: ");
$minMax = new NumberSquare($minInput,$maxInput);

$firstLine = $minMax->getFirstLine();

echo $minMax->getFirstLine() . PHP_EOL;

for($i=1;$i<$minMax->getMax();$i++){
    $firstLine = $minMax->turnAround($firstLine);
    echo $firstLine . PHP_EOL;
}





