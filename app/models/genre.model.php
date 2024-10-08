<?php

class GenreModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=g41_db_movies;charset=utf8', 'root', '');
    }
    public function getGenres()
    {
        $query = $this->db->prepare('SELECT * FROM genre');
        $query->execute();

        $genres = $query->fetchAll(PDO::FETCH_OBJ);
        return $genres;
    }
}
