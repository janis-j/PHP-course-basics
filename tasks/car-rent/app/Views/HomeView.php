<?php

namespace App1\Views;

use App1\Models\CarRent;


function background(CarRent $item): string
{
    if($item->available()){
        return "style='background-color : limegreen'";
    }else{
        return "style='background-color : red'";
    }
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style type="text/css">
        body {
            background-color: #f6f6ff;
            font-family: Calibri, Myriad, serif;
        }

        #main {
            width: 780px;
            padding: 20px;
            margin: auto;
        }

        table.carRent {
            margin: auto;
            width: 600px;
            border-collapse: collapse;
        }

        table.carRent caption {
            background-color: #f79646;
            color: #fff;
            font-size: x-large;
            font-weight: bold;
            letter-spacing: .3em;
        }

        table.carRent thead th {
            padding: 8px;
            background-color: #fde9d9;
            font-size: large;
        }

        table.carRent thead th#thDay {
            width: 40%;
        }

        table.carRent thead th#thRegular, table.carRent thead th#thOvertime, table.carRent thead th#thTotal {
            width: 20%;
        }

        table.carRent th, table.carRent td {
            padding: 3px;
            border-width: 1px;
            border-style: solid;
            border-color: #f79646 #ccc;
        }

        table.carRent td {
            text-align: right;
        }

        table.carRent tbody th {
            text-align: left;
            font-weight: normal;
        }

        table.carRent tfoot {
            font-weight: bold;
            font-size: large;
            background-color: #687886;
            color: #fff;
        }

        table.carRent tr.even {
            background-color: #fde9d9;
        }


    </style>
    <title>Car Rent</title>
</head>

<body>
<div id="main">
    <table class="carRent">
        <caption>JOHNY CAR RENT</caption>
        <thead>
        <tr>
            <th id="Make">Make / model</th>
            <th id="thYear">Year</th>
            <th id="thFuel">Fuel type</th>
            <th id="thEngine">Engine</th>
            <th id="thGearbox">Gearbox</th>
            <th id="thDrive">Drive</th>
            <th id="thRentPrice">Rent price</th>
            <th id="thAvailable">Availability</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?PHP
        $oddEven = "odd";
        foreach ($collection->collection() as $item) {
            echo "<tr class=$oddEven>
                     <th>{$item->infoOnCar()[0]}</th>
                     <td>{$item->infoOnCar()[1]}</td>
                     <td>{$item->infoOnCar()[2]}</td>
                     <td>{$item->infoOnCar()[3]}</td>
                     <td>{$item->infoOnCar()[4]}</td>
                     <td>{$item->infoOnCar()[5]}</td>
                     <td>{$item->infoOnCar()[6]}</td>
                     <td " . background($item) . ">{$item->infoOnCar()[7]}</td>
                     <td>{$item->infoOnCar()[8]}</td>
                  </tr>";
            if($oddEven === "odd"){
                $oddEven = "even";
            }else{$oddEven = "odd";}
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>