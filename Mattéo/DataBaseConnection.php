<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'Projet_WEB';

//Connection to the DB
try{
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Debug connection
  echo "Connexion établie";
}
catch (PDOException $error){
  // Debug error connection
  echo "Echec de la connexion: ".$error->getMessage();
}
?>