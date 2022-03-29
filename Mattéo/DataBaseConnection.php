<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'Projet_WEB';

//Connection to the DB
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$servername = "mysql.hostinger.fr"; 
$database = "u000000001_nom"; 
$username = "u000000001_user"; 
$password = "MotDePasse";
$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];