<?php

// FlowerShop
//List of flowers & prices
//Option to purchase
//if female -> apply - 20% discount at the end
//3 different warehouse where flowers come from
require_once 'iWarehouse.php';
require_once 'Flowers.php';
require_once 'Warehouse1.php';
require_once 'Warehouse2.php';
require_once 'Warehouse3.php';
require_once 'FlowerShop.php';
require_once 'Application.php';

(new Application)->run();


