<?php
require_once './app/models/movie.model.php';
require_once './app/views/movie.view.php';

class MovieController
{
   private $model;
   private $view;
   public function __construct()
   {
      $this->model = new MovieModel();
      $this->view = new MovieView();
   }
   function showMovies()
   {
      $movies = $this->model->getMovies();
      return $this->view->showMovies($movies);
   }
   function showMoviesByGenre($id_genre){
      $movies = $this->model->getMoviesByGenre($id_genre);
      return $this->view->showMovies($movies);
   }
   function showMovieById($id){
      $movie = $this->model->getMovieById($id);
      return $this->view->showMovieById($movie);
   }
}
