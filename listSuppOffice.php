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
                ?>

<body id="suppoffer-body">
  <?php
// NAVBAR
    @require_once 'navbar.php';
    
    ?>
  <!-- Main -->
  <main id="suppoffer-main">

    <h1>Bureaux</h1>
      <div class="recherche">
        <div class="form">

    
    <hr class="rod" />
    <!-- action à implémenter -->
    <form action="" method="get" class="research-form">

        <!-- Company -->
        <label for="name-selector">SIRET du bureau :</label>
        <input list="name" name="name" class="research-input" placeholder="">
        <input type="submit" value="Rechercher" class="research-input research-button">
      </form>
      </div>

        <?php
        if(isset($_GET['name'])){
          $name = $_GET['name'];
          $query = $connexion->query("SELECT * FROM office LEFT JOIN company ON Office.SIREN = Company.SIREN WHERE SIRET='$name' OR Company_name='$name';");
          if($query === false){
            var_dump($connexion->errorInfo());
            die('Erreur SQL');
          }
          $posts = $query->fetchAll();
          
          foreach ($posts as $post) {
                ?>
                <p><?php echo $post['Company_name'];?>(<?php echo $post['SIRET'];?>) - <a href="suppoffice.php?SIRET=<?= $post['SIRET']; ?>&Locality_ID=<?= $post['Locality_ID']; ?>">Supprimer</a></p>
                <?php
                }
        }else{ 
          
                $sqlQuery = 'SELECT * FROM office LEFT JOIN company ON office.SIREN = company.SIREN;';
                $recipesStatement = $connexion->prepare($sqlQuery);
                $recipesStatement->execute();
                $recipes = $recipesStatement->fetchAll();

                // On affiche chaque recette une à une
                foreach ($recipes as $recipe) {
                ?>
                <p><?php echo $recipe['Company_name'];?>(<?php echo $recipe['SIRET'];?>) - <a href="suppoffice.php?SIRET=<?= $recipe['SIRET']; ?>&Locality_ID=<?= $recipe['Locality_ID']; ?>">Supprimer</a></p>
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