<?php

class Lines
{
    private array $elements = [];

    public function __construct(array $elements)
    {
        foreach($elements as $element){
            $this->addElement($element);
        }
    }

    private function addElement(Element $element): void
    {
        $this->elements[] = $element;
    }
}