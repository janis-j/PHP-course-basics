<?php

require_once 'SlotMachine.php';
require_once 'Player.php';
require_once 'Element.php';
require_once 'SlotMachine.php';
require_once 'Line.php';

$player = new Player;
$player->setMoney(200);
$player->setBet(20);

$machine = new SlotMachine([
    new Element('A', 10),
    new Element('K', 8),
    new Element('Q', 7),
//    new Element('J', 5),
//    new Element('X', 20),
]);

$machine->roll();

foreach ($machine->getSlots() as $slot)
{
    foreach ($slot as $element){
        echo (string) $element . ' ';
    }
    echo PHP_EOL;
}
echo $machine->getReward() . PHP_EOL;