<?php

require_once 'Dog.php';
require_once 'Dogs.php';

$dogs = new Dogs;

$molly = new Dog("Molly", "female", null, null);
$lady = new Dog("Lady", "female", null, $molly);
$rocky = new Dog("Rocky", "male", null, $lady);
$max = new Dog("Max", "male", $rocky, $lady);
$sam = new Dog("Sam", "male", $max, $molly);
$sparky = new Dog("Sparky", "male", $sam, $lady);
$buster = new Dog("Buster", "male", $sam, $lady);
$coco = new Dog("Coco", "female", $max, $molly);

$dogs->addDogs([$molly, $lady, $rocky, $max, $sam, $sparky, $buster, $coco]);

foreach ($dogs->getDogs() as $dog) {
    echo $dog->getName() . PHP_EOL;
}
$dog1 = $dogs->getDogByName((string)ucfirst(strtolower(readline("Enter first dogs name from a list: "))));
$dog2 = $dogs->getDogByName((string)ucfirst(strtolower(readline("Enter second dogs name from a list: "))));

echo 'First dog: ' . $dog1->getInfoOnDog($dog1) . PHP_EOL;
echo 'Second dog: ' . $dog2->getInfoOnDog($dog2) . PHP_EOL;

if ($dogs->hasSameMotherAs($dog1, $dog2)) {
    if ($dogs->getDogByName($dog1)->getMothersName() === "unknown") {
        echo "Both dogs mother is unknown" . PHP_EOL;
    } else {
        echo "{$dog1->getName()} and {$dog2->getName()} has the same mother: " . $dog1->getMothersName() . PHP_EOL;
    }
}else{
    echo "{$dog1->getName()} and {$dog2->getName()} has different mothers!". PHP_EOL;
}


