<?php

class Movie
{
    private string $movie;
    private string $studio;
    private string $rating;

    public function __construct(string $movie, string $studio, string $rating)
    {
        $this->movie = $movie;
        $this->studio = $studio;
        $this->rating = $rating;

    }

    public function getRating(): string
    {
        return $this->rating;
    }
}





