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
    <main id="main-box">
        <div id="authentification-box" style="margin:12px;">
          <h1 id="authentification-title">S'authentifier :</h1>
          <br>
          <form action="" method="post" id="spacing">
            <label for="login">Identifiant :</label>
            <input type="text" name="login" placeholder="Exemple : JeanMiDu13" style="border-radius:5px; border-color:black;">
            <br>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" placeholder="MonMotDePasse" style="border-radius:5px; border-color:black;">
            <br>
            <input type="submit" value="Se connecter" >
          </form>

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

            if(isset($_POST["login"])){
              $userLogin = $_POST["login"];
              $userPassword = $_POST["password"];

              //creating prepared query
              $query = $conn->prepare("SELECT * FROM contact WHERE Login=:login AND Password=:password");/*création de la requete*/
              $query->bindParam(':login',$userLogin);
              $query->bindParam(':password',$userPassword);

              $query->execute();

              if($query === false){
                  var_dump($conn->errorInfo());
                  die('Erreur SQL');
              }

              $posts = $query->fetchAll();

              //checking if there is a result to the query and access to index.php
              if(isset($posts[0])){
                header("LOCATION: http://localhost/Projet_WEB/index.php");
              }
              else{
                echo('<p>Erreur dans le login et/ou le mot de passe, réessayez.</p>');
              }
            }
            else{
              echo'Renseignez les champs si dessus pour vous identifier.';
            }
            //debug function//
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
            ?>
        </div>
    </main>
  </body>
</html>