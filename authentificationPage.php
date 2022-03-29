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
            <?php
            if(isset($_POST["login"])){
              $userLogin = $_POST["login"];
              $userPassword = $_POST["password"];
              echo 'Login :'.htmlspecialchars($_POST["login"]);
              ?>
              <br>
              <?php
              echo 'Password :'.htmlspecialchars($_POST["password"]);
            }
            else{
              echo'Renseignez les champs si dessus pour vous identifier';
            }
            $servername = 'localhost';
            $dbname = 'projet_web';
            $username = 'root';
            $password = '';




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
            
            // debug($dbname);

            //On établit la connexion
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,[
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ /*PDO::FETCH_OBJ utile pour nettoyer le retour des queries*/
            ]);

            $query = $conn->query("SELECT * FROM contact WHERE Login='$userLogin' AND Password='$userPassword'");/*création de la requete*/

            if($query === false){
                var_dump($conn->errorInfo());
                die('Erreur SQL');
            }
        $posts = $query->fetchAll();
        if(isset($posts[0])){
          debug($posts);
          header("LOCATION: http://localhost/Projet_WEB/index.php");
        }
        ?>
          </form>
        </div>
      </main>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                           
    <!-- Script -->
    <script src="/js/js.js"></script>
  </body>
</html>