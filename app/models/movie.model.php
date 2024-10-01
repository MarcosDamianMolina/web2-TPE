<?php
class MovieModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=g41_db_movies;charset=utf8', 'root', '');
    }

    public function getMovies()
    {
        $query = $this->db->prepare('SELECT * FROM movie');
        $query->execute();

        $movies = $query->fetchAll(PDO::FETCH_OBJ);
        return $movies;
    }
    public function getMovieById($id)
    {
        $query = $this->db->prepare('SELECT * FROM movie WHERE id = ?');
        $query->execute([$id]);

        $movie = $query->fetch(PDO::FETCH_OBJ);
        return $movie;
    }
    public function getMoviesByGenre($id_genre)
    {
        $query = $this->db->prepare('SELECT * FROM movie WHERE id_genre = ?');
        $query->execute([$id_genre]);
        $movies = $query->fetchAll(PDO::FETCH_OBJ);
        return $movies;
    }
}
