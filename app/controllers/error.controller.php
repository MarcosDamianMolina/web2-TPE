<?php

require_once './app/views/error.view.php';

class ErrorController
{
    private $view;

    public function __construct()
    {
        $this->view = new ErrorView;
    }
    public function showError($error)
    {
        return $this->view->showError($error);
    }
}
