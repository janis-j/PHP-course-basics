<?php

namespace App1\Models;

use App1\Models\Transport\iTransport;

class CarRent
{
    private iTransport $transport;
    private int $rentPrice;
    private bool $available;

    public function __construct(iTransport $transport, int $rentPrice, bool $available)
    {
        $this->transport = $transport;
        $this->rentPrice = $rentPrice;
        $this->available = $available;
    }

    public function available(): bool
    {
        return $this->available;
    }

    private function setAvailable()
    {
        if ($this->available) {
            $this->available = false;
        } else {
            $this->available = true;
        }
        $this->writeToJson();
        header('Location: /');
    }

    private function printAvailable(): string
    {
        if ($this->available) {
            return 'available';
        } else {
            return 'not available';
        }
    }

    public function infoOnCar(): array
    {
        return [
            $this->transport->name(),
            $this->transport->year(),
            $this->transport->fuelType(),
            $this->transport->engine(),
            $this->transport->gearbox(),
            $this->transport->drive(),
            $this->rentPrice,
            $this->printAvailable(),
            "<form method='post'>
                <input type='submit' value={$this->setButtonName()} name = {$this->transport->id() }>
             </form>"
        ];
    }

    private function setButtonName(): string
    {
        if (key($_POST) === $this->transport->id()) {
            $this->setAvailable();
        }
        if ($this->available) {
            return "rent";
        } else {
            return "return";
        }
    }

    private function writeToJson(): void
    {
        $json = json_decode(file_get_contents
            (
                '/home/janis/PhpstormProjects/PHP-course/tasks/car-rent/Storage/Table.json'
            )
            , true);
        $json[$this->transport->id()]["available"] = $this->available;
        $newJsonString = json_encode($json);
        file_put_contents('/home/janis/PhpstormProjects/PHP-course/tasks/car-rent/Storage/Table.json',
            $newJsonString);
    }
}