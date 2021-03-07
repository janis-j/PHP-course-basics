<?php

require_once 'Video.php';
require_once 'VideoStore.php';

class Application
{
    private VideoStore $videoStore;

    public function __construct()
    {
        $this->videoStore = new VideoStore;
    }

    public function run(): void
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $bool = false;
            $command = '';
            while($bool) {
                $command = (int)readline("Choose from a list: ");
                if($command < 5 && $command > -1){
                    $bool = true;
                }else{
                    echo 'Choose from available options!!';
                }
            }
            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $moviesCount = (int)readline("How many movies you will add? ");
                    $movies = [];
                    for ($i = 1; $i <= $moviesCount; $i++) {
                        $movie = readline("Input $i. movie: ");
                        $movies[] = new Video($movie);
                    }
                    $this->addMovies($movies);
                    break;
                case 2:
                    $number = 0;
                    $availableMoviesNum = [];
                    foreach ($this->listInventory() as $video) {
                        if ($video->getIfChecked()) {
                            echo '[X] ' . $video->getVideo() . PHP_EOL;
                            $number++;
                        } else {
                            echo "[$number] " . $video->getVideo() . PHP_EOL;
                            $availableMoviesNum[] = $number;
                            $number++;
                        }
                    };
                    $bool = false;
                    $witchMovie = '';
                    while (!$bool) {
                        $witchMovie = (int)readline('Pick a movie from list: ' . PHP_EOL);
                        if (in_array($witchMovie, $availableMoviesNum)) {
                            $this->rentVideo($witchMovie);
                            $bool = true;
                        } else {
                            echo 'Pick available movie from list!!' . PHP_EOL;
                        }
                    }
                    break;
                case 3:
                    $number = 0;
                    $rentedMoviesNum = [];
                    foreach ($this->listInventory() as $video) {
                        if ($video->getIfChecked()) {
                            echo "[$number] " . $video->getVideo() . PHP_EOL;
                            $rentedMoviesNum[] = $number;
                            $number++;
                        } else {
                            echo '[X] ' . $video->getVideo() . PHP_EOL;
                            $number++;
                        }
                    }
                    $bool = false;
                    $witchMovie = '';
                    while (!$bool) {
                        $witchMovie = (int)readline('Pick from list a movie you want to return: ' . PHP_EOL);
                        if (in_array($witchMovie, $rentedMoviesNum)) {
                            $bool2 = false;
                            $rating = 0;
                            while (!$bool2) {
                                $rating = (int)readline('Rate movie (1-10): ');
                                if ($rating > 0 && $rating < 11) {
                                    $bool2 = true;
                                }
                            }
                            $this->returnVideo($witchMovie, $rating);
                            $bool = true;
                        } else {
                            echo 'Pick a movie from list, that you have rented, and want to return!!' . PHP_EOL;
                        }
                    }
                    break;
                case 4:
                    $number = 0;
                    foreach ($this->listInventory() as $video) {
                        if ($video->getIfChecked()) {
                            echo '[X] ' . $video->getVideo() . PHP_EOL;
                            $number++;
                        } else {
                            echo "[$number] " . $video->getVideo() . PHP_EOL;
                            $number++;
                        }
                    };
                    break;
                default:
                    echo "Sorry, I don't understand you.." . PHP_EOL;
            }
        }
    }

    private function addMovies(array $videoNames): void
    {
        $this->videoStore->addFewVideos($videoNames);
    }

    private function rentVideo(int $witchMovie)
    {
        $this->videoStore->getVideoByKey($witchMovie)->setIfChecked(true);
    }

    private function returnVideo(int $witchMovie, int $rating)
    {
        $this->videoStore->getVideoByKey($witchMovie)->setIfChecked(false);
        $this->videoStore->getVideoByKey($witchMovie)->setRating($rating);
    }

    private function listInventory(): array
    {
        return $this->videoStore->listInventory();
    }
}

$app = new Application;

$app->run();