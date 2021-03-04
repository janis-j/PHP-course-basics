<?php

require_once 'Movie.php';
require_once 'Movies.php';

$movies = new Movies;
$movies->addMovie(new Movie('Casino Royale', 'Eon Productions', 'PG13'));
$movies->addMovie(new Movie('Glass', 'Buena Vista International', 'PG'));
$movies->addMovie(new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG'));

var_dump($movies->getPG());
