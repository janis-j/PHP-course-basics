<?php

require_once 'Book.php';
require_once 'BookCollection.php';

$books = new BookCollection;

try{
    $books->removeAt(1);
} catch (OutOfRangeException $exception){
    var_dump($exception->getMessage());
}

