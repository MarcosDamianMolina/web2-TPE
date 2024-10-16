<?php

class GenreView{
    public function showGenres($genres){
        require_once 'templates/genres.phtml';
    }
    public function showEditGenres($genres){
        require_once 'templates/edit_genres.phtml';
    }
    public function showEditGenre($genre){
        require_once 'templates/edit_genre.phtml';
    }
}