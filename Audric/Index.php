<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1>Tests du back</h1>

<?php
  $servername = 'localhost';
  $dbname = 'projet_chopes_ton_stage';
  $username = 'root';
  $password = '';
// Etablissment de la connexion avec la BDD

  $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,[
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ /*PDO::FETCH_OBJ utile pour nettoyer le retour des queries*/
  ]);

// préparation d'une requête 
  $query = $connexion->query("SELECT * FROM permissions");/*création de la requete*/
    if($query === false){
      var_dump($connexion->errorInfo());
      die('Erreur SQL');
    }

$posts = $query->fetchAll();
?>

</body>
</html>