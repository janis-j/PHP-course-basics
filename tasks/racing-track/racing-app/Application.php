<?php

namespace RacingApp;

use RacingApp\vehicle\Car;

class Application
{
    public function run()
    {
        $leaderBoard = new LeaderBoard();
        $racersCollection = new RacersCollection;
        $racersCollection->addFewRacers([
            new Racer(new Car('BMW', [1, 3], [0, 0]), 'Hakkinen', '1', [59, 78]),
            new Racer(new Car('OPEL', [2, 4], [1, 0]), 'Koivunen', '2', [45, 65]),
            new Racer(new Car('AUDI', [2, 4], [2, 0]), 'Bukkunen', '3', [97, 15]),
            new Racer(new Car('FIAT', [2, 4], [3, 0]), 'Sakkuvi', '4', [98, 2])
        ]);

        $rows = count($racersCollection->getRacersCollection());
        $track = new RacingTrack(30, $rows);

        while (true) {
            print("\033[2J\033[;H");
            $randomNum = random_int(1, 100);

            $leaderBoard->timeTick();

            $redrawTrack = $track->getTrack();

            foreach ($racersCollection->getRacersCollection() as $racer) {
                $coord = $racer->vehicle()->getCoordinates();
                $redrawTrack[$coord[0]][$coord[1]] = $racer->startNumber();
                if (!$racer->getIfFinished() && $coord[1] === $track->getLength()) {
                    $leaderBoard->addFinished($racer);
                    $racer->setFinished();
                } else if (!$racer->getIfFinished() && in_array($randomNum, $racer->getCrashCo())) {
                    $leaderBoard->addCrashed($racer);
                    $racer->setFinished();
                    $racer->startNumber();
                }
                $racer->vehicle()->addYCoordinate($track->getLength(), $racer->getIfFinished());
            }
            foreach ($redrawTrack as $line) {
                echo implode($line) . PHP_EOL;
            }
            echo PHP_EOL;
            echo "--------------LEADERBOARD---------------" . PHP_EOL;
            foreach ($leaderBoard->leaderBoard() as $key => $racer) {
                echo ($key + 1) . ". $racer[0] with $racer[1] finished in $racer[2] sec" . PHP_EOL;
            }
            foreach ($leaderBoard->crashedBoard() as $racer) {
                echo "$racer[0] with $racer[1] crashed.." . PHP_EOL;
            }
            sleep(1);

            if (count($leaderBoard->leaderBoard()) + count($leaderBoard->crashedBoard()) === $rows) {
                exit('Bye!' . PHP_EOL);
            }
        }
    }
}