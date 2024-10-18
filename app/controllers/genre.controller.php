<?php
require_once './app/models/genre.model.php';
require_once './app/views/genre.view.php';
require_once './app/models/movie.model.php';
require_once './app/views/error.view.php';
class GenreController
{
    private $model;
    private $view;

    public function __construct($res)
    {
        $this->model = new GenreModel();
        $this->view = new GenreView($res->user);
    }
    function showGenres()
    {
        $genres = $this->model->getGenres();
        return $this->view->showGenres($genres);
    }
    function addGenre($genre)
    {
        if (!isset($_POST['genre']) || empty($_POST['genre'])) {
            $errorView = new ErrorView();
            $errorView->showError('Falta completar el nombre de la categoria');
        }
        $genre = $_POST['genre'];

        $this->model->insertGenre($genre);
        header('Location: http://localhost/WEB2_2024/web2-TPE/editar/categoria');
    }
    function editGenres()
    {
        $genres = $this->model->getGenres();
        return $this->view->showEditGenres($genres);
    }
    function editGenre($id)
    {
        if (!isset($_POST['genre']) || empty($_POST['genre'])) {
            $errorView = new ErrorView();
            $errorView->showError('Falta completar el nombre de la categoria');
        }
        $genre = $_POST['genre'];
        $this->model->updateGenre($id, $genre);
        header('Location: http://localhost/WEB2_2024/web2-TPE/editar/categoria');
    }
    function deleteGenre($id)
    {
        $movieModel = new MovieModel();
        $movies = $movieModel->getMoviesByGenre($id);
        if (count($movies) != 0) {
            $errorView = new ErrorView();
            $errorView->showError("No se puede eliminar porque hay peliculas en ésta categoria");
        } else {
            $this->model->removeGenre($id);
            header('Location: http://localhost/WEB2_2024/web2-TPE/editar/categoria');
        }
    }
}
