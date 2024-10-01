<?php

class MovieView
{
    public function showMovies($movies)
    {
        require_once 'templates/home.phtml';
    }
    public function showMoviesByGenre($movies){
        require_once 'templates/genre.phtml';
    }
}
