<?php

class UserModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=g41_db_movies;charset=utf8', 'root', '');
    }
 
    public function getUserByUsername($username) { 
           
        $query = $this->db->prepare("SELECT * FROM user WHERE username = ?");
        $query->execute([$username]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}