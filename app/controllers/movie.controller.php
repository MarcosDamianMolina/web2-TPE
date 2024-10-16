<?php
require_once './app/models/movie.model.php';
require_once './app/views/movie.view.php';
require_once './app/models/genre.model.php';
require_once 'error.controller.php';

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
   function showEditMovies()
   {
      $movies = $this->model->getMovies();
      return $this->view->showEditMovies($movies);
   }
   function showAddMovie()
   {
      $genres = $this->genreModel->getGenres();
      return $this->view->showFormAdd($genres);
   }
   function addMovie()
   {
      if (!isset($_POST['title']) || empty($_POST['title'])) {
         $controller = new ErrorController();
         $controller->showError('Falta completar el título de la pelicula');
      }
      if (!isset($_POST['director']) || empty($_POST['director'])) {
         $controller = new ErrorController();
         $controller->showError('Falta completar el director de la pelicula');
      }
      if (!isset($_POST['genre']) || empty($_POST['genre'])) {
         $controller = new ErrorController();
         $controller->showError('Falta completar el genero de la pelicula');
      }
      if (!isset($_POST['img']) || empty($_POST['img'])) {
         $controller = new ErrorController();
         $controller->showError('Falta completar la portada de la pelicula');
      }

      $title = $_POST['title'];
      $director = $_POST['director'];
      $id_genre = $_POST['genre'];
      $img = $_POST['img'];
      $descrip = $_POST['descrip'];

      $this->model->insertMovie($title, $director, $id_genre, $descrip, $img);
      header('Location: ' . BASE_URL);
   }
   function editMovie($id){
      $movie = $this->model->getMovieById($id);
      $genres = $this->genreModel->getGenres();
      return $this->view->showEditMovie($movie, $genres);
   }
   function updateMovie($id){
      if (!isset($_POST['title']) || empty($_POST['title'])) {
         $controller = new ErrorController();
         $controller->showError('Falta completar el título de la pelicula');
      }
      if (!isset($_POST['director']) || empty($_POST['director'])) {
         $controller = new ErrorController();
         $controller->showError('Falta completar el director de la pelicula');
      }
      if (!isset($_POST['genre']) || empty($_POST['genre'])) {
         $controller = new ErrorController();
         $controller->showError('Falta completar el genero de la pelicula');
      }
      if (!isset($_POST['img']) || empty($_POST['img'])) {
         $controller = new ErrorController();
         $controller->showError('Falta completar la portada de la pelicula');
      }

      $title = $_POST['title'];
      $director = $_POST['director'];
      $id_genre = $_POST['genre'];
      $img = $_POST['img'];
      $descrip = $_POST['descrip'];

      $this->model->updateMovie($title, $director, $id_genre, $descrip, $img, $id);
      header('Location: http://localhost/WEB2_2024/web2-TPE/editar');
   }
   function deleteMovie($id)
   {
      $this->model->removeMovie($id);
      header('Location: http://localhost/WEB2_2024/web2-TPE/editar');
   }
}
