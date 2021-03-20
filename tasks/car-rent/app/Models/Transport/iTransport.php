<?php

namespace App1\Models\Transport;

interface iTransport
{
    public function id():int;
    public function name():string;
    public function year():int;
    public function fuelType():string;
    public function engine():string;
    public function gearbox():string;
    public function drive():string;
}