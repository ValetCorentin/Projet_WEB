<!doctype html>
<html lang="en">
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
    ?>


  <!-- Header with navbar -->
    <header>
      <nav class="navbar">
        <ul class="navbar-menu">
          <li class="navbar-logo"><a href="index.html">Chopes ton stage</a></li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Rechercher</a>
            <ul class="navbar-submenu">
              <li class="navbar-subitem"><a href="#">Stages</a></li>
              <li class="navbar-subitem"><a href="#">Entreprises</a></li>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Favoris</a>
            <ul class="navbar-submenu">
              <li class="navbar-subitem"><a href="#">Offres postulées</a></li>
              <li class="navbar-subitem"><a href="#">Wishlist</a></li>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Statistiques</a>
            <ul class="navbar-submenu">
              <li class="navbar-subitem"><a href="#">Profils</a></li>
              <li class="navbar-subitem"><a href="#">Entreprises</a></li>
              <li class="navbar-subitem"><a href="#">Stages</a></li>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Stages</a>
            <ul class="navbar-submenu">
              <li class="navbar-subitem"><a href="#">Modifier</a></li>
              <li class="navbar-subitem"><a href="#">Supprimer</a></li>
              <li class="navbar-subitem"><a href="#">Créer</a></li>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Profils</a>
            <ul class="navbar-submenu">
              <li class="navbar-subitem"><a href="#">Modifier</a></li>
              <li class="navbar-subitem"><a href="#">Supprimer</a></li>
              <li class="navbar-subitem"><a href="createProfile.html">Créer</a></li>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Entreprises</a>
            <ul class="navbar-submenu">
              <li class="navbar-subitem"><a href="#">Modifier</a></li>
              <li class="navbar-subitem"><a href="#">Supprimer</a></li>
              <li class="navbar-subitem"><a href="#">Créer</a></li>
            </ul>
          </li>
            <li class="navbar-toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
        </ul>
      </nav>
    </header>

    <!-- Main -->

  <main class="container">

    <div class="row research-box">
      <form action="" class="research-form">
        <label for="domain-selector">Domaine :</label>
        <input list="domains" class="research-input" placeholder="Choisissez un domaine ">
        <datalist id="domains">
          <option value="BDD">
          <option value="Réseau">
          <option value="Systèmes embarqués">
        </datalist>
        <input type="text" class="research-input" placeholder="...">
        <input type="submit" value="Rechercher" class="research-input research-button">
      </form>
    </div>

    <?php
    
    $query = $conn->query("SELECT COUNT(*) AS COUNTER FROM Offer");
    if($query === false){
      var_dump($conn->errorInfo());
      die('Erreur SQL');
  }

  $posts = $query->fetchAll();

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
$numberOffer = ($posts[0]->COUNTER);

    ?>

    <h2 id="offer-number"><?php echo($numberOffer) ?> offres disponibles :</h2>
    <hr>
    <?php
    $query = $conn->query("SELECT * FROM offer");/*création de la requete*/
            if($query === false){
                var_dump($conn->errorInfo());
                die('Erreur SQL');
            }
        $posts = $query->fetchAll();
    ?>
    <?php foreach($posts as $post): ?>
      <div class="row offer-box">
      <h3><?= htmlentities($post->Promotion_type)?></h3>
      <article>
        <p>Informatique</p>
        <p>Poitou-Charentes</p>
        <p>Date de début : <?= htmlentities($post->Offer_date) ?></p>
        <p><?= htmlentities($post->Duration) ?> mois</p>
        <p>Salaire : <?= htmlentities($post->Salary) ?> €</p>
        <img src="./images/heart_empty.png" alt="empty-heart" style="max-width: 28px;">
      </article>
      <p style="text-align: end;">Posté le <?= htmlentities($post->Offer_posting_date) ?></p>
    </div>

    <?php endforeach ?>

  </main>

                                        <!-- Footer -->
    <footer>
      <div class="footer-trait" id="footer-center-things">
          <HR ALIGN=CENTER WIDTH="800">
      </div>
          <p id="footer-center-things">Notre équipe :</p>

      <div id="footer-center-things">
          <div id="footer-member">
              <a href="https://github.com/Didicap" target="_blank"><img id="footer-pp" src="images/Odric.png" alt="noPP"></a>
              <br>
              <p>Audric CAPET</p>
          </div>
          <div id="footer-member">
              <a href="https://www.linkedin.com/in/mathieu-gu%C3%A9nier-a513a0215/" target="_blank"><img id="footer-pp" src="images/M.png" alt="noPP"></a>
              <br>
              <p>Mathieu GUENIER</p>
          </div>
          <div id="footer-member">
              <a href="https://github.com/Mattken12" target="_blank"><img id="footer-pp" src="images/matteo.png" alt="noPP"></a>
              <br>
              <p>Mattéo FAUVEL</p>
          </div>
          <div id="footer-member">
              <a href="https://github.com/P3mast" target="_blank"><img id="footer-pp" src="images/Olivier.png" alt="noPP"></a>
              <br>
              <p>Olivier GOSSET</p>
          </div>
              
          <div id="footer-member">
              <a href="https://github.com/VALET-Corentin" target="_blank"><img id="footer-pp" src="images/Coco.png" alt="noPP"></a>
              <br>
              <p>Corentin VALET</p>
          </div>
      </div>
      <div class="footer-legal">
          <p id="footer-center-things">2022</p>
          <p id="footer-center-things">Mentions Légales - <a id="footer-apropos" href="#">A propos de nous</a></p>
      </div>
  </footer>

    <!-- Script -->
    <script src="/js/js.js"></script>
  </body>
</html>