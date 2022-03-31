<!doctype html>
<html lang="fr">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Links -->
    <link rel="stylesheet" href="scss/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


    <title>Chopes ton stage</title>
  </head>
  <body>

    <!-- PHP -->
    <?php
      $servername = 'localhost';
      $dbname = 'projet_web';
      $username = 'root';
      $password = '';

      //Etablishing connexion
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ /*PDO::FETCH_OBJ utile pour nettoyer le retour des queries*/
      ]);

      $data = json_decode($_COOKIE['user_profil'], true);

    // NAVBAR
    @require_once 'navbar.php';
    
    ?>

    <!-- Main -->

  <main class="container">

    <?php
    
    $query = $conn->query("SELECT COUNT(*) AS COUNTER FROM Company");
    if($query === false){
      var_dump($conn->errorInfo());
      die('Erreur SQL');
  }

  $posts = $query->fetchAll();
  $numberOffer = ($posts[0]->COUNTER);
    ?>

    <h2 id="offer-number"><?php echo($numberOffer) ?> entreprises référencées sur le site !</h2>
    <hr>

    <?php
    /*creating the query*/

    $query = $conn->query("SELECT * FROM company");

      if($query === false){
          var_dump($conn->errorInfo());
          die('Erreur SQL');
      }
      $posts = $query->fetchAll();
    foreach($posts as $post): ?>

      <div class="row offer-box">
        <h3><?=strtoupper(htmlentities($post->Company_name))?></h3>
        <article>
        <?php
          /*creating the query*/
          $queryOffice = $conn->query("SELECT * FROM company LEFT JOIN office ON company.SIREN = office.SIREN LEFT JOIN address ON office.Locality_ID = address.Locality_ID LEFT JOIN is_part_of ON office.SIRET = is_part_of.SIRET WHERE Company_name = '$post->Company_name';
          ");
            if($queryOffice === false){
                var_dump($conn->errorInfo());
                die('Erreur SQL');
            }
            $postsOffice = $queryOffice->fetchAll();
          foreach($postsOffice as $postOffice): ?>
            <br>
            <h4>SIRET du Bureau : <?=strtoupper(htmlentities($postOffice->SIRET))?></h4>
            <p><?= strtoupper(htmlentities($postOffice->Country)) ?> <?= htmlentities($postOffice->Region) ?> <?= htmlentities($postOffice->Zip_code) ?> <?= htmlentities($postOffice->City) ?> </p>
            <p><?=htmlentities($postOffice->Activity_sector_name)?></p>
            <p>nombre de stagiaire venant du CESI : <?=htmlentities($postOffice->Number_trainee)?></p>
            <p>Note de confiance des tuteurs sur ce Bureau : <?=htmlentities($postOffice->Office_grade)?>/5</p>
          <?php endforeach ?>
        </article>
      </div>

    <?php endforeach ?>

  </main>

  <?php
  @require_once 'footer.php';
?>

    <!-- Script -->
    <script src="./js/js.js"></script>
  </body>
</html>