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



 <!-- Connexion à la base de donnée -->
 <?php
                $hostname = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'projet_web';
                
                //On essaie de se connecter
                try{
                    $connexion = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
                    //On définit le mode d'erreur de PDO sur Exception
                    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                
                /*On capture les exceptions si une exception est lancée et on affiche
                les informations relatives à celle-ci*/
                catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
                }
                $data = json_decode($_COOKIE['user_profil'], true);
                ?>

<body id="suppprofile-body">
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
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Wishlist</a></li>');
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
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Supprimer</a></li>');
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
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Supprimer</a></li>');
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
  <main id="suppprofile-main">

    <h1>Profils</h1>
      <div class="recherche">
        <div class="form">

    
    <hr class="rod" />
    <!-- action à implémenter -->
    <form action="" method="get" class="research-form">

        <!-- name -->
        <label for="name-selector">Nom/Prénom :</label>
        <input list="name" name="name" class="research-input" placeholder="Prénom/NOM">

        
        <input type="submit" value="Rechercher" class="research-input research-button">
      </form>
      </div>

        <?php
        if(isset($_GET['name'])){
          $name = $_GET['name'];
          
          $query = $connexion->query("SELECT * FROM contact WHERE First_name = '$name' or Last_name = '$name'");
          if($query === false){
            var_dump($connexion->errorInfo());
            die('Erreur SQL');
          }
          $posts = $query->fetchAll();
          foreach ($posts as $post) {
                ?>
                <p><?php echo $post['First_name'];?> <?php echo $post['Last_name'];?> - <a href="suppProfile.php?name_id=<?= $post['Contact_ID']; ?>">Supprimer</a></p>
                <?php
                }
        }else{ 
          
                $sqlQuery = 'SELECT * FROM contact';
                $recipesStatement = $connexion->prepare($sqlQuery);
                $recipesStatement->execute();
                $recipes = $recipesStatement->fetchAll();

                // On affiche chaque recette une à une
                foreach ($recipes as $recipe) {
                ?>
                
                <p><?php echo $recipe['First_name'];?> <?php echo $recipe['Last_name'];?> - <a href="suppProfile.php?name_id=<?= $recipe['Contact_ID']; ?>">Supprimer</a></p>
                <?php
                }
                ?>
        <?php
            } ?>
            </div>

      
      


      
      
  </main>
  <!-- Script -->
  <script src="js/js.js"></script>
</body>

</html>