<?php
require_once './app/models/genre.model.php';
require_once './app/views/genre.view.php';
class GenreController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new GenreModel();
        $this->view = new GenreView();
    }
    function showGenres(){
        $genres = $this->model->getGenres();
        return $this->view->showGenres($genres);
    }
}
