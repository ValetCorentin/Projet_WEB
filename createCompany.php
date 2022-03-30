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

<?php
$data = json_decode($_COOKIE['user_profil'], true);
?>

<body id="createCompany-body">
<!-- Header with navbar -->
<header>
      <nav class="navbar">
        <ul class="navbar-menu">
          <li class="navbar-logo"><a href="index.php">Chopes ton stage</a></li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Rechercher</a>
            <ul class="navbar-submenu">
            <?php if($data['LF_offer']==1){ 
                echo('<li class="navbar-subitem"><a href="index.php">Stages</a></li>');
                };?>
                <?php if($data['LF_company']==1){ 
                echo('<li class="navbar-subitem"><a href="companyPage.php">Entreprises</a></li>');
                };?>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Favoris</a>
            <ul class="navbar-submenu">
              <?php if($data['To_apply']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Offres postulées</a></li>');
                };?>
              <?php if($data['Add_to_wishlist']==1){ 
                echo('<li class="navbar-subitem"><a href="wishlistPage.php">Wishlist</a></li>');
                };?>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Statistiques</a>
            <ul class="navbar-submenu">
              <li class="navbar-subitem"><a href="commingSoonPage.html">Profils</a></li>
              <li class="navbar-subitem"><a href="commingSoonPage.html">Entreprises</a></li>
              <li class="navbar-subitem"><a href="commingSoonPage.html">Stages</a></li>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Stages</a>
            <ul class="navbar-submenu">
              <?php if($data['Modif_offer']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Modifier</a></li>');
                };?>
              <?php if($data['Del_offer']==1){ 
                echo('<li class="navbar-subitem"><a href="listSuppOffer.php">Supprimer</a></li>');
                };?>
              <?php if($data['Create_offer']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Créer</a></li>');
                };?>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Profils</a>
            <ul class="navbar-submenu">
              <?php if($data['Modif_student']==1 || $data['Modif_representative']==1 || $data['Modif_pilot']==1) { 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Modifier</a></li>');
                };?>
              <?php if($data['Del_student']==1 || $data['Del_representative']==1 || $data['Del_pilot']==1){ 
                echo('<li class="navbar-subitem"><a href="listSuppProfile.php">Supprimer</a></li>');
                };?>
              <?php if($data['Create_student']==1 || $data['Create_representative']==1 || $data['Create_pilot']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Créer</a></li>');
                };?>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Entreprises</a>
            <ul class="navbar-submenu">
              <?php if($data['Modif_company']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Modifier</a></li>');
                };?>
                <?php if($data['Del_company']==1){ 
                echo('<li class="navbar-subitem"><a href="listSuppCompany.php">Supprimer</a></li>');
                };?>
              <?php if($data['Create_company']==1){ 
                echo('<li class="navbar-subitem"><a href="createCompany.php">Créer</a></li>');
                };?>
            </ul>
          </li>
          <a href="disconnect.php" class="navbar-item">Déconnexion</a>

            <li class="navbar-toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
            
        </ul>
        
        
      </nav>
    </header>

  <!-- Main -->
  <main id="createCompany-main">
    <h1>Création du profil entreprise</h1>
    <hr class="rod" />
    <!-- action à implémenter -->
    <form id="createCompany-form" action="" name="Company_form" method="post">
      <div id="company_name_and_siren">
        <div id="company_box">
          <!-- Company_name -->
          <label for="Company_name">Nom de l'entreprise</label>
          <input type="text" name="Company_name" id="Company_ID_input" minlength="8" maxlength="8" placeholder="8 caractères nécessaires" />
        </div>

        <div id="siren_box">
          <!-- Siren -->
          <label for="Siren">Numéro de SIREN</label>
          <input type="text" name="Siren" id="Surname_Input" placeholder="SIREN" />
        </div>
          <input id="but" type="submit" value="Valider">


      </div>

      <?php
      $servername = 'localhost';
      $dbname = 'projet_web';
      $username = 'root';
      $password = '';

      //Etablishing connexion
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ /*PDO::FETCH_OBJ utile pour nettoyer le retour des queries*/
      ]);

      if (isset($_POST["Company_name"])) {

        $company_name = $_POST["Company_name"];
        $siren = $_POST["Siren"];

        //creating prepared query
        $query = $conn->prepare("INSERT INTO company (SIREN, Company_name) VALUES (:siren, :company_name)");/*création de la requete*/
        // $query = $conn->query("INSERT INTO company (SIREN, Company_name) VALUES ('$company_name', '$siren')");
        $query->bindParam(':company_name', $company_name);
        $query->bindParam(':siren', $siren);

        $query->execute();

        if ($query === false) {
          var_dump($conn->errorInfo());
          die('Erreur SQL');
        } else {
          echo ('<p>La requête est bien partie</p>');
        }
      }
      ?>
    </form>
  </main>
  <!-- Script -->
  <script src="js/js.js"></script>
</body>

</html>