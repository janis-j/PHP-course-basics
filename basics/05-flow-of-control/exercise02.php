<?php

$inputNumber = readline("Enter positive or negative number: ");

$trueFalse = '';
if($inputNumber>0){
    $trueFalse = "positive!";
}else{
    $trueFalse = "negative!";
}

echo "This number is $trueFalse" . PHP_EOL;

//todo print if number is positive or negative