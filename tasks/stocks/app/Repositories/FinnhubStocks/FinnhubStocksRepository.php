<?php

namespace App\Repositories\FinnhubStocks;

use Finnhub\Api\DefaultApi;
use Finnhub\Configuration;
use GuzzleHttp\Client;

class FinnhubStocksRepository implements QuoteStocksRepository
{
    private DefaultApi $client;

    public function __construct()
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('token', 'c1qu1faad3iatqdn3dlg');
        $this->client = new DefaultApi(
            new Client(),
            $config
        );
    }

    public function quote(string $name): int
    {
        $stock = $this->client->quote($name);
        return $stock['c'] * 100;
    }

}