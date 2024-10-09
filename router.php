<?php
require_once 'libs/response.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/controllers/movie.controller.php';
require_once 'app/controllers/error.controller.php';
require_once 'app/controllers/genre.controller.php';
require_once 'app/controllers/auth.controller.php';

////////////////////TABLA DE CASOS/////////////////
// home ----> MovieController->showMovies();
// pelicula/:ID ------> MovieController->showMoviesById(id);
// agregar -------> MovieController->addMovie();
// editar/:ID -------> MovieController->updateMovie(id);
// eliminar/:ID ------> MovieController->deleteMovie(id);
// categorias ------> showGenres();
// categoria/:ID ------> showMovieByGenre(id_genre);


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$res = new Response();

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        //saque la validacion del user
        $controller = new MovieController($res);
        $controller->showMovies();
        break;
    case 'pelicula':
        // saque la validacion del user
        $controller = new MovieController($res);
        $controller->showMovieById($params[1]);
        break;
    case 'categorias':
        // saque la validacion del user
        $controller = new GenreController($res);
        $controller->showGenres();
        break;
    case 'categoria':
        // saque la validacion del user
        $controller = new MovieController($res);
        $controller->showMoviesByGenre($params[1]);
        break;
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'editar':
        sessionAuthMiddleware($res);
        $controller = new MovieController($res);
        $controller->showEditMovies();
        break;
    case 'agregar':
        sessionAuthMiddleware($res);
        $controller = new MovieController($res);
        $controller->addMovie();
        break;
    default:
        $controller = new ErrorController();
        $controller->showError("Error 404 Not Found");
        break;
}
