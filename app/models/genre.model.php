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
    public function getGenreById($id){
        $query = $this->db->prepare('SELECT * FROM genre WHERE id = ?');
        $query->execute([$id]);

        $genre = $query->fetch(PDO::FETCH_OBJ);
        return $genre;
    }
    public function insertGenre($genre){
        $query = $this->db->prepare('INSERT INTO genre(genre) VALUES (?)');
        $query->execute([$genre]);
    }
    public function updateGenre($id, $genre){
        $query = $this->db->prepare('UPDATE genre SET genre = ? WHERE id = ?');
        $query->execute([$genre, $id]);
    }
    public function removeGenre($id){
        $query = $this->db->prepare('DELETE FROM genre WHERE id = ?');
        $query->execute([$id]);
    }
}
