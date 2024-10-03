<?php
require_once './app/models/movie.model.php';
require_once './app/views/movie.view.php';
require_once './error.controller.php';

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
   function showMoviesByGenre($id_genre)
   {
      $movies = $this->model->getMoviesByGenre($id_genre);
      return $this->view->showMovies($movies);
   }
   function showMovieById($id)
   {
      $movie = $this->model->getMovieById($id);
      return $this->view->showMovieById($movie);
   }
   function addMovie()
   {
      if (
         !isset($_POST['title']) || empty($_POST['title']) ||
         !isset($_POST['director']) || empty($_POST['director']) ||
         !isset($_POST['genre']) || empty($_POST['genre'])
      ) {
         $controller = new ErrorController();
         return $controller->showError("Faltan completar datos");
      }
      $title = $_POST['title'];
      $director = $_POST['director'];
      $genre = $_POST['genre'];
      $description = $_POST['description'];
      $img = $_POST['img'];

      $id = $this->model->insertMovie($title, $director, $genre, $description, $img);
      
      header('Location: ' . BASE_URL);
   }
   function deleteMovie($id) {
      $movie = $this->model->getMovieById($id);
      if (!$movie){
         $controller = new ErrorController();
         return $controller->showError("No existe una pelicula con el id: $id");
      }
      $this->model->removeMovie($id);
   }
}
