<?php


class Movies
{
    private array $movies = [];

    public function addMovie(Movie $movie)
    {
        $this->movies[] = $movie;
    }

    public function getPG(): array
    {
        $tempArray = [];
        foreach ($this->movies as $key => $movie) {
            if ($movie->getRating() === 'PG')
                $tempArray[] = $movie;
        }
        return $tempArray;
    }
}