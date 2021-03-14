<?php

abstract class Food
{
//    public abstract function isTasty(): bool;
    public bool $isTasty = true;

    public abstract function size(): string;
}

class Sushi extends Food
{
    public bool $isTasty = false;
}