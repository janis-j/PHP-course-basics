<?php

class Line
{
    private array $elements = [];

    public function __construct(array $elements)
    {
        foreach ($elements as $element) {
            $this->addElement($element);
        }
    }

    private function addElement(Element $element): void
    {
        $this->elements[] = $element;
    }

    public function getReward(): int
    {
        $firstElement = null;
        $equalElement = 1;

        foreach ($this->elements as $element)
        {
            if ($firstElement === null)
            {
                $firstElement = $element;
                continue;
            }
            if ((string)$element !== (string)$firstElement) break;

                $equalElement++;
        }
        return $equalElement >= 3 ? $firstElement->getReward() * $equalElement : 0;
    }
}