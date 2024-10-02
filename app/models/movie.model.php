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
        $query = $this->db->prepare('SELECT m.*, g.genre FROM movie m JOIN genre g ON m.id_genre = g.id');
        $query->execute();

        $movies = $query->fetchAll(PDO::FETCH_OBJ);
        return $movies;
    }
    public function getMovieById($id)
    {
        $query = $this->db->prepare('SELECT m.*, g.genre FROM movie m JOIN genre g ON m.id_genre = g.id WHERE m.id = ?');
        $query->execute([$id]);

        $movie = $query->fetch(PDO::FETCH_OBJ);
        return $movie;
    }
    public function getMoviesByGenre($id_genre)
    {
        $query = $this->db->prepare('SELECT m.*, g.genre FROM movie m JOIN genre g ON m.id_genre = g.id WHERE m.id_genre = ?');
        $query->execute([$id_genre]);
        $movies = $query->fetchAll(PDO::FETCH_OBJ);
        return $movies;
    }
}
