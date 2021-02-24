<?php

$firstWord = readline("First word: ");
$secondWord = readline("Second word: ");

echo $firstWord;
for ($i = 0; $i < (30 - strlen($firstWord) - strlen($secondWord)); $i++) {
    echo ".";
};
echo $secondWord . PHP_EOL;