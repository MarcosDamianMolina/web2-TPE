<?php
require_once './app/models/movie.model.php';
require_once './app/views/movie.view.php';
require_once './app/models/genre.model.php';

class MovieController
{
   private $model;
   private $view;
   private $genreModel;
   public function __construct($res)
   {
      $this->model = new MovieModel();
      $this->view = new MovieView();
      $this->genreModel = new GenreModel($res->user);
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
   function showAddMovie()
   {
      $genres = $this->genreModel->getGenres();
      return $this->view->showFormAdd($genres);
   }
   function addMovie()
   {
      if (
         !isset($_POST['title']) || empty($_POST['title']) ||
         $_POST(['director']) || empty($_POST['director']) ||
         $_POST(['genre']) || empty($_POST['genre']) ||
         $_POST(['img']) || empty($_POST['img'])
      ) {
         return $this->view->showFormAdd('Falta completar el nombre de usuario');
      }
      $title = $_POST['title'];
      $director = $_POST['director'];
      $id_genre = $_POST['genre'];
      $description = $_POST['description'];
      $img = $_POST['img'];
      
      $id = $this->model->insertMovie($title, $director, $id_genre, $description, $img);
      header('Location: ' . BASE_URL);
   }
   function deleteMovie($id)
   {
      $movie = $this->model->getMovieById($id);
      $this->model->removeMovie($id);
   }
}
