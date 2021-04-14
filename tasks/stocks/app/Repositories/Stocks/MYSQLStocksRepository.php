<?php

namespace App\Repositories\Stocks;

use App\Models\Stock;
use App\Models\StocksCollection;
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

    public function getStocks(): ?StocksCollection
    {
        $stocks = $this->database->select("Stocks", '*');
        $collection = new StocksCollection();

        foreach ($stocks as $stock) {
            $collection->add(new Stock(
                $stock['id'],
                $stock['name'],
                $stock['amount'],
                $stock['price'],
                $stock['date']
            ));
        }
        return $collection;
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