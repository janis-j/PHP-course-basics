<?php

namespace FlowerStore;

require_once 'iGoods.php';
require_once 'Warehouses/iWarehouse.php';
require_once 'Goods/Flower.php';
require_once 'Product.php';
require_once 'ProductCollection.php';
require_once 'Warehouses/Warehouse1.php';
require_once 'Warehouses/Warehouse2.php';
require_once 'Warehouses/Warehouse3.php';
require_once 'FlowerShop.php';
require_once 'Application.php';

$flowerShop = new Application();

$flowerShop->run();



