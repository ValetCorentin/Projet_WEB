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
  <?php
// NAVBAR
    @require_once 'navbar.php';
    
    ?>

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
          <input type="text" name="Company_name" id="Company_ID_input" placeholder="Nom de l'entreprise" autocomplete="off"/>
        </div>

        <div id="siren_box">
          <!-- Siren -->
          <label for="Siren">Numéro de SIREN</label>
          <input type="text" name="Siren" id="SIREN_Input" minlength="8" maxlength="8" placeholder="8 chiffres nécessaires" />
        </div>

          <div id="company_email_box">
          <!-- Company_email -->
          <label for="Company_mail">Addresse mail de l'entreprise</label>
          <input type="email" name="Company_mail" id="company_mail_input" placeholder="email@exemple.fr" />
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
        $company_mail = $_POST["Company_mail"];

        //creating prepared query
        $query = $conn->prepare("INSERT INTO company (SIREN, Company_name, Company_mail) VALUES (:siren, :company_name, :company_mail)");/*création de la requete*/
        $query->bindParam(':company_name', $company_name);
        $query->bindParam(':siren', $siren);
        $query->bindParam(':company_mail', $company_mail);


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