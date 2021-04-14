<?php

namespace App\Repositories\Stocks;

use App\Models\Stock;
use Medoo\Medoo;

class MYSQLStocksRepository implements StocksRepository
{
    private Medoo $database;

    public function __construct()
    {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'codelex',
            'server' => 'localhost',
            'username' => 'janis',
            'password' => 'Maximus21@'
        ]);
    }

    public function save(Stock $stock): void
    {
        $this->database->insert("Stocks", $stock->toArray());
    }

    public function getStocks(): ?Stock
    {
        $stock = $this->database->select("Stocks", [
            "id",
            "name",
            "amount",
            "price",
        ], [
            "{$_POST['radioInput']}[~]" => $_POST['textInput']
        ]);
        return new Stock(
            $stock[0]['id'],
            $stock[0]['name'],
            $stock[0]['amount'],
            $stock[0]['price']
        );
    }

    public function sellStocks(string $id): void
    {
        $this->database->delete("Registry", [
            "AND" => [
                "id" => $id,
            ]
        ]);
    }

    public function executeDescription(array $nameDescription): void
    {
//        $this->database->update("Registry", [
//            "description" => $idDescription[0]
//        ], [
//            "id[=]" => $idDescription[1]
//        ]);
    }
}