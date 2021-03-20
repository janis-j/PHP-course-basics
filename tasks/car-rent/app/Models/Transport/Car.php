<?php

namespace App1\Models\Transport;

class Car implements iTransport
{
   private int $id;
   private string $name;
   private int $year;
   private string $fuelType;
   private string $engine;
   private string $gearbox;
   private string $drive;


   public function __construct(int $id, string $name, int $year, string $fuelType, string $engine, string $gearbox, string $drive)
   {
       $this->id = $id;
       $this->name = $name;
       $this->year = $year;
       $this->fuelType = $fuelType;
       $this->engine = $engine;
       $this->gearbox = $gearbox;
       $this->drive = $drive;
   }

    public function id():int
    {
        return $this->id;
    }

   public function name():string
   {
       return $this->name;
   }

   public function year():int
   {
       return $this->year;
   }

    public function fuelType(): string
    {
        return $this->fuelType;
    }

    public function engine():string
    {
        return $this->engine;
    }

    public function gearbox():string
    {
        return $this->gearbox;
    }

    public function drive():string
    {
        return $this->drive;
    }

}