<?php

$inputString = strtolower(readline("Input a string: "));
$splittedString = str_split($inputString);

foreach ($splittedString as $letter) {
    switch ($letter) {
        case (in_array($letter, ["a", "b", "c"])):
            echo 2;
            break;
        case (in_array($letter, ["d", "e", "f"])):
            echo 3;
            break;
        case (in_array($letter, ["g", "h", "i"])):
            echo 4;
            break;
        case (in_array($letter, ["j", "k", "l"])):
            echo 5;
            break;
        case (in_array($letter, ["m", "n", "o"])):
            echo 6;
            break;
        case (in_array($letter, ["p", "q", "r", "s"])):
            echo 7;
            break;
        case (in_array($letter, ["t", "u", "v"])):
            echo 8;
            break;
        case (in_array($letter, ["w", "x", "y", "z"])):
            echo 9;
            break;
    }
}echo PHP_EOL;

$inputString = strtolower(readline("Input a string: "));
$splittedString = str_split($inputString);

foreach ($splittedString as $letter) {
    if (strpbrk("abc", $letter)) {
        echo 2;
    } else if (strpbrk("def", $letter)) {
        echo 3;
    }else if (strpbrk("ghi", $letter)) {
        echo 4;
    }else if (strpbrk("jkl", $letter)) {
        echo 5;
    }else if (strpbrk("mno", $letter)) {
        echo 6;
    }else if (strpbrk("pqrs", $letter)) {
        echo 7;
    }else if (strpbrk("tuv", $letter)) {
        echo 8;
    }else if (strpbrk("wxyz", $letter)) {
        echo 9;
    }
}echo PHP_EOL;