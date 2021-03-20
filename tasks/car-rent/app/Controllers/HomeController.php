<?php

namespace App1\Controllers;

use App1\Models\CarRent;
use App1\Models\Transport\Car;
use App1\Models\TransportCollection;

class HomeController
{
    public function index()
    {
        $collection = new TransportCollection();
        $json = json_decode(file_get_contents
            (
                '/home/janis/PhpstormProjects/PHP-course/tasks/car-rent/Storage/Table.json'
            )
            , true);
        foreach ($json as $row) {
            $collection->addOne(
                new CarRent(new Car($row["id"], $row["name"], $row["year"], $row["fuelType"], $row["engine"], $row["gearbox"],
                    $row["drive"]), $row["rentPrice"], $row["available"]));
        }

        require_once 'app/Views/HomeView.php';
    }
}