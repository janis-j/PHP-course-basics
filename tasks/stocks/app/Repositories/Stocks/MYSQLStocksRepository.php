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
            'username' => '',
            'password' => ''
        ]);
    }

    public function save(Stock $stock): void
    {
        $this->database->insert("stocks", $stock->toArray());
    }

    public function getStocks(): ?StocksCollection
    {
        $stocks = $this->database->select("stocks", '*');
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

    public function getStock(int $id): ?Stock
    {
        $stock = $this->database->select("stocks", [
            "id",
            "name",
            "amount",
            "price",
            "date"
        ], [
            "id[=]" => $id
        ])[0];

        return new Stock(
            $stock["id"],
            $stock["name"],
            $stock["amount"],
            $stock["price"],
            $stock["date"]
        );
    }

    public function sellStock(string $id): void
    {
        $this->database->delete("stocks", [
            "AND" => [
                "id" => $id,
            ]
        ]);
    }
}