<?php

class SlotMachine
{
    private array $slots = [];
    private array $elements;
    private array $lines = [];

    private int $horizontalSlotsCount;
    private int $verticalSlotsCount;


    public function __construct(
        array $elements,
        int $horizontalSlotsCount = 5,
        int $verticalSlotsCount = 3
    )
    {
        foreach ($elements as $element) {
            $this->addElement($element);
        }

        $this->horizontalSlotsCount = $horizontalSlotsCount;
        $this->verticalSlotsCount = $verticalSlotsCount;
    }

    public function roll(): void
    {
        for($i = 0;$i < $this->verticalSlotsCount; $i++)
        {
            for($j = 0;$j < $this->horizontalSlotsCount; $j++)
            {
                $randomElement = $this->elements[array_rand($this->elements)];
                $this->slots[$i][$j] = $randomElement;
            }
        }
        $this->formLines();
    }

    private function formLines():void
    {
        for($v = 0;$v<$this->verticalSlotsCount; $v++){
            $this->lines[] = new Line($this->slots[$v]);
        }

    }

    public function getReward(): int
    {
        $reward = 0;

        foreach($this->lines as $line){
            $reward += $line->getReward();
        }
        return $reward;
    }

    public function getSlots(): array
    {
        return $this->slots;
    }

    private function addElement(Element $element): void
    {
        $this->elements[] = $element;
    }
}