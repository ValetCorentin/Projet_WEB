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

    <div class="row research-box">
      <form action="" method="get" class="research-form">

        <!-- Domains -->
        <label>Domaine :</label>
        <input list="domains" name="domain" class="research-input" placeholder="Choisissez un domaine ">
        <?php
        $query = $conn->query("SELECT * FROM Activity_sector");
        if($query === false){
          var_dump($conn->errorInfo());
          die('Erreur SQL');
        }
     
        $posts = $query->fetchAll();?>
        <datalist id="domains">
        <?php foreach($posts as $post): ?>
            <option value="<?= htmlentities($post->Activity_sector_name)?>">
        <?php endforeach ?>
        </datalist>
        <input type="submit" value="Rechercher" class="research-input research-button">
      </form>

      <form action="" method="post" class="research-form">
        <!-- Add to wishlist -->
        <label>ID de l'offre à ajouter dans la wishlist :</label>
        <input type="number" name="IDToWhishlist" class="research-input" placeholder="Entrez l'ID">
        <input type="submit" value="Ajouter" class="research-input research-button">
      </form>

<?php
      if (isset($_POST["IDToWhishlist"])) {
        $IDToWhishlist = $_POST["IDToWhishlist"];
        //creating prepared query
        $query = $conn->prepare("INSERT INTO whishs (Offer_ID, Contact_ID) VALUES (:Offer_ID,:Contact_ID)");/*création de la requete*/
        $query->bindParam(':Offer_ID', $IDToWhishlist);
        $query->bindParam(':Contact_ID', $data['Contact_ID']);

        $query->execute();

        if ($query === false) {
            var_dump($conn->errorInfo());
            die('Erreur SQL');
        }
      }
  ?>

  <form action="" method="post" class="research-form">
        <!-- Apply -->
        <label>ID de l'offre où vous souhaitez postuler :</label>
        <input type="number" name="IDToApply" class="research-input" placeholder="Entrez l'ID">
        <input type="submit" value="Postuler" class="research-input research-button">
  </form>

<?php
      if (isset($_POST["IDToApply"])) {
        $IDToApply = $_POST["IDToApply"];
        //creating prepared query
        $query = $conn->prepare("INSERT INTO Apply (Offer_ID, Contact_ID) VALUES (:Offer_ID,:Contact_ID)");/*création de la requete*/
        $query->bindParam(':Offer_ID', $IDToApply);
        $query->bindParam(':Contact_ID', $data['Contact_ID']);

        $query->execute();

        if ($query === false) {
            var_dump($conn->errorInfo());
            die('Erreur SQL');
        }

        $query = $conn->prepare("SELECT Company_mail FROM company
        LEFT JOIN office ON company.SIREN = Office.SIREN
        LEFT JOIN Offer ON office.SIRET = Offer.SIRET
        WHERE Offer_ID = :Offer_ID;");/*création de la requete*/
        $query->bindParam(':Offer_ID', $IDToApply);

        $query->execute();

        if ($query === false) {
            var_dump($conn->errorInfo());
            die('Erreur SQL');
        }
        $posts = $query->fetchAll();
        foreach($posts as $post){
          ?> <p style="text-align:center;" > Adresse email de l'entreprise où vous souhaitez postuler : <?php echo($post->Company_mail);?> </p>
        
        <?php
        } 
      }
  ?>
      
    </div>
    <?php

    $domain='';

if(isset($_GET['domain'])){
  $domain = $_GET['domain'];
}
    
    
    
    if($domain == ''){
      $queryCompletor = "SELECT offer.Offer_ID, Duration, Offer_posting_date, Offer_date, Salary, Number_place, Promotion_type, Offer_grade, offer.SIRET, Number_trainee, Country, City, Zip_code, Address, Region, Activity_sector_name, Company_name
      FROM Offer
      LEFT JOIN office ON Offer.SIRET = Office.SIRET
      LEFT JOIN address ON address.Locality_ID = Office.Locality_ID
      LEFT JOIN is_part_of ON offer.SIRET = is_part_of.SIRET
      LEFT JOIN needs ON offer.Offer_ID = needs.Offer_ID
      LEFT JOIN company ON office.SIREN = company.SIREN;";
    }
    else{
      $queryCompletor ="SELECT offer.Offer_ID, Duration, Offer_posting_date, Offer_date, Salary, Number_place, Promotion_type, Offer_grade, offer.SIRET, Number_trainee, Country, City, Zip_code, Address, Region, Activity_sector_name, Company_name
    FROM Offer
    LEFT JOIN office ON Offer.SIRET = Office.SIRET
    LEFT JOIN address ON address.Locality_ID = Office.Locality_ID
    LEFT JOIN is_part_of ON offer.SIRET = is_part_of.SIRET
    LEFT JOIN needs ON offer.Offer_ID = needs.Offer_ID
    LEFT JOIN company ON office.SIREN = company.SIREN WHERE Activity_sector_name = '$domain';";
    }
    
    $query = $conn->query("SELECT COUNT(*) AS COUNTER FROM Offer");
    if($query === false){
      var_dump($conn->errorInfo());
      die('Erreur SQL');
  }

  $posts = $query->fetchAll();
  $numberOffer = ($posts[0]->COUNTER);
    ?>

    <h2 id="offer-number"><?php echo($numberOffer) ?> offres disponibles sur le site !</h2>
    <hr>
    <?php
        /*creating query*/
    $query = $conn->query($queryCompletor);

      if($query === false){
          var_dump($conn->errorInfo());
          die('Erreur SQL');
      }
      $posts = $query->fetchAll();
      $incrementOffer = 0;
    foreach($posts as $post): ?>
      <?php $incrementOffer += 1; ?>
      <div class="row offer-box" id="Offer-<?php echo($incrementOffer) ?>">
        <h3><?= htmlentities($post->Promotion_type)?> . <?=strtoupper(htmlentities($post->Company_name))?></h3>
        <strong>ID de l'offre : <?= htmlentities($post->Offer_ID) ?></strong>
        <article>
          <p><?= ucfirst(htmlentities($post->Activity_sector_name)) ?></p>
          <p><?= strtoupper(htmlentities($post->Country)) ?> <?= htmlentities($post->Region) ?> <?= htmlentities($post->Zip_code) ?> <?= htmlentities($post->City) ?> </p>
          <p>Date de début : <?= htmlentities($post->Offer_date) ?></p>
          <p>Durée : <?= htmlentities($post->Duration) ?> mois</p>
          <p>Salaire : <?= htmlentities($post->Salary) ?> €</p>
          <p>Note de confiance des tuteurs : <?= htmlentities($post->Offer_grade) ?> /5</p>
        </article>
        <p style="text-align: end;">Posté le <?= htmlentities($post->Offer_posting_date) ?></p>
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