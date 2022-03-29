<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'Projet_web';

//Connection to the DB
try{
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
  // Debug connection
  // echo "Connexion établie";
}
catch (PDOException $error){
  // Debug error connection
  // echo "Echec de la connexion: ".$error->getMessage();
}
?>