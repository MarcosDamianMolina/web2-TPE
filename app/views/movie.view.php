<?php

class MovieView
{
    public function showMovies($movies)
    {
        require_once 'templates/home.phtml';
    }
    public function showMoviesByGenre($movies)
    {
        require_once 'templates/genre.phtml';
    }
    public function showMovieById($movie)
    {
        require_once 'templates/movie.phtml';
    }
    public function showFormAdd($genres)
    {
        require_once 'templates/form_nueva_movie.phtml';
    }
    public function showEditMovies($movies)
    {
        require_once 'templates/edit.phtml';
    }
}
