<?php


class Dog
{
private string $name;
private string $sex;
private ?Dog $fathersName;
private ?Dog $mothersName;
    public function __construct(string $name, string $sex,$fathersName = null,$mothersName = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->fathersName = $fathersName;
        $this->mothersName = $mothersName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function getMothersName(): string
    {
        if($this->mothersName === null ) {
            return "unknown";
        }
        return $this->mothersName->getName();
    }

    public function getFathersName(): string
    {
        if($this->fathersName === null ) {
            return "unknown";
        }
        return $this->fathersName->getName();
    }

    public function getInfoOnDog(): string
    {
       return $this->getName() . ' has ' . $this->getMothersName() . ' as mother, and ' . $this->getFathersName() . ' as father.';
    }
}