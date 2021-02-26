<?php

class FuelGauge
{
    private int $litersInTank;

    public function __construct(int $litersInTank)
    {
        $this->litersInTank = $litersInTank;
    }

    public function reportFuelAmount(): int
    {
        return $this->litersInTank;
    }

    public function isTankEmpty(bool &$gotFuel): string
    {
        if (in_array($this->reportFuelAmount(), [1, 2, 3, 4, 5])) {
            return "Warning!! Less than 5 litres left..";
        } else if ($this->reportFuelAmount() === 0) {
            $gotFuel = false;
            return "You have ran out of fuel!!" . PHP_EOL;
        }
        return " ";
    }

    public function fillTank(int $amount): string
    {
        if ($this->litersInTank + $amount > 70) {
            return "There is " . $this->litersInTank . " liters in tang already, you can add " . (70 - $this->litersInTank) . "liters or less.." . PHP_EOL;
        }
        $this->litersInTank += $amount;
        return "All good, have a nice trip!" . PHP_EOL;
    }

    public function decrementFuel(): void
    {
        $this->litersInTank--;
    }
}

class Odometer
{
    private int $mileage;

    public function __construct(int $mileage)
    {
        $this->mileage = $mileage;
    }

    public function reportCarsMileage(): int
    {
        return $this->mileage;
    }

    public function incrementMileage(): void
    {
        if ($this->mileage > 999998) {
            $this->mileage = 0;
        }
        $this->mileage++;
    }
}

$fuelGauge = new FuelGauge(2);
$odometer = new Odometer(999998);

$countEach10 = 0;

while (true) {
    $gotFuel = true;
    echo "Fuel in tank: " . $fuelGauge->reportFuelAmount() . "litres" . PHP_EOL;
    echo "[0] drive" . PHP_EOL;
    echo "[1] fill" . PHP_EOL;
    $driveOrFill = (int)readline("Choose an option: ");
    if ($driveOrFill === 0) {
        while ($gotFuel) {
            print("\033[2J\033[;H");
            $countEach10++;
            echo 'Odometer: ' . sprintf('%06d', $odometer->reportCarsMileage()) . PHP_EOL;
            echo 'Fuel level: ' . $fuelGauge->reportFuelAmount() . " litres" . PHP_EOL;
            $odometer->incrementMileage();
            if ($countEach10 === 10) {
                $fuelGauge->decrementFuel();
                $countEach10 = 0;
            }
            echo $fuelGauge->isTankEmpty();
            sleep(1);
        }
    } else if ($driveOrFill === 1) {
        $fuelQuantity = readline("How much fuel you would like to fill?: ");
        echo $fuelGauge->fillTank($fuelQuantity);
    }
}