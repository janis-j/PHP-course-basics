<?php


class Application2
{
    public function run()
    {
        $racersCollection = new RacersCollection;
        $racersCollection->addFewObjects([
            new Racer(1, 0, 0, [2, 4], [20, 40]),
            new Racer(2, 1, 0, [1, 3], [45, 65]),
            new Racer(3, 2, 0, [2, 3], [97, 15]),
            new Racer(4, 3, 0, [1, 2], [98, 2])
        ]);

        $rows = count($racersCollection->getRacersCollection());
        $track = new RacingTrack(30, $rows);

        while (true) {
            print("\033[2J\033[;H");
            $randomNum = random_int(1, 100);

            $track->timeTick();

            $redrawTrack = $track->getTrack();

            foreach ($racersCollection->getRacersCollection() as $racer) {
                $redrawTrack[$racer->getCoordinates()[0]][$racer->getCoordinates()[1]] = $racer->getRacersNumber();
                if (!$racer->getIfFinished() && $racer->getCoordinates()[1] === $track->getLength()) {
                    $track->addFinished($racer->getRacersNumber(), $track->getTime());
                    $racer->setFinished();
                } else if (!$racer->getIfFinished() && in_array($randomNum, $racer->getCrashCo())) {
                    $track->addCrashed($racer->getRacersNumber());
                    $racer->setFinished();
                    $racer->setStartNumber();
                }
                $racer->addYCoord($track->getLength());
            }
            foreach ($redrawTrack as $line) {
                echo implode($line) . PHP_EOL;
            }
            echo PHP_EOL;
            echo "---------LEADERBOARD----------" . PHP_EOL;
            foreach ($track->getFinished() as $key => $racer) {
                echo ($key + 1) . '. racer no ' . $racer[0] . " finished in " . $racer[1] . PHP_EOL;
            }
            foreach ($track->getCrashed() as $racer) {
                echo 'Racer no ' . $racer . ' crashed..' . PHP_EOL;
            }
            sleep(1);

            if (count($track->getFinished()) + count($track->getCrashed()) === $rows) {
                exit('Bye!' . PHP_EOL);
            };
        }
    }
}