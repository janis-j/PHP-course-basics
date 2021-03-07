<?php

class Survey
{
    private int $surveyed = 12467;
    private float $purchasedEnergyDrinks = 0.14;
    private float $preferCitrusDrinks = 0.64;

    public function calculateEnergyDrinkers(): int
    {
        return floor($this->surveyed * $this->purchasedEnergyDrinks);
    }

    public function calculatePreferCitrus(): int
    {
        return floor($this->calculateEnergyDrinkers() * $this->preferCitrusDrinks);
    }

    public function getNumOfSurveyedPeople(): int
    {
        return $this->surveyed;
    }
}

$survey = new Survey;


echo "Total number of people surveyed " . $survey->getNumOfSurveyedPeople() . PHP_EOL;
echo "Approximately " . $survey->calculateEnergyDrinkers() . " bought at least one energy drink" . PHP_EOL;
echo $survey->calculatePreferCitrus() . " of those prefer citrus flavored energy drinks." . PHP_EOL;
