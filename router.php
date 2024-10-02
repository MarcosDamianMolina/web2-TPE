<?php
require_once 'app/controllers/movie.controller.php';
require_once 'app/controllers/error.controller.php';
require_once 'app/controllers/genre.controller.php';

////////////////////TABLA DE CASOS/////////////////
// home ----> showMovies();
// pelicula ------> showMoviesById(id);
// categorias ------> showGenres();
// categoria ------> showMovieByGenre(genre);
// director ------> showMoviesByDirector(id);


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new MovieController();
        $controller->showMovies();
        break;
    case 'pelicula':
        $controller = new MovieController();
        $controller->showMovieById($params[1]);
        break;
    case 'categorias':
        $controller = new GenreController();
        $controller->showGenres();
        break;
    case 'categoria':
        $controller = new MovieController();
        $controller->showMoviesByGenre($params[1]);
        break;
    default:
        $controller = new ErrorController();
        $controller->showError("Error 404 Not Found");
        break;
}
