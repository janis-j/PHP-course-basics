<?php


class Movies
{
    private array $movies = [];

    public function addMovie(Movie $movie)
    {
        $this->movies[] = $movie;
    }

    public function getPG(): array{
        return array_filter($this->movies, function(Movie $movie){
            return $movie->getRating() === "PG";
        });
    }
}