<?php

function pickADay(): string
{
    $inputDay = readline("Pick a day of the week (0-6): ");

    switch ($inputDay) {
        case 0:
            return "U picked Monday";
        case 1:
            return "U picked Tuesday";
        case 2:
            return "U picked Wednesday";
        case 3:
            return "U picked Thursday";
        case 4:
            return "U picked Friday";
        case 5:
            return "U picked Saturday";
        case 6:
            return "U picked Sunday";
        default:
            return "Not a valid day!";
    }
}

function pickADay2(): string
{
    $inputDay =(int) readline("Pick a day of the week (0-6): ");
    if($inputDay === 0){
        return "U picked Monday";
    }else if($inputDay === 1){
        return "U picked Tuesday";
    }else if($inputDay === 2){
        return "U picked Wednesday";
    }else if($inputDay === 3){
        return "U picked Thursday";
    }else if($inputDay === 4){
        return "U picked Friday";
    }else if($inputDay === 5){
        return "U picked Saturday";
    }else if($inputDay === 6){
        return "U picked Sunday";
    }else{
        return "Not a valid day!";
    }
}

echo pickADay() . PHP_EOL;
echo pickADay2() . PHP_EOL;


