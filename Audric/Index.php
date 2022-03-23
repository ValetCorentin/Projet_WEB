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
<nav class="navbar navbar-expand-lg navbar-light bg-light container">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Test</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Domaines
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Domaine 1</a></li>
            <li><a class="dropdown-item" href="#">Domaine 2</a></li>
            <li><a class="dropdown-item" href="#">Domaine 3</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>
<?php

// constantes pour la connexion
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


<?php
function debug($var){
  ?>
  <pre>
  <?php
  echo "Ma var: ".$var."<br>";
  var_dump($var);
  ?>
  </pre>
  <?php
}

debug($posts);
echo($posts[0]->Permission_ID);
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>