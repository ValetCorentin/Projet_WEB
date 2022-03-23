<!DOCTYPE html>
<html>
    <head>
        <title>Recherche</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
      <div class ="container">
        <h1>Bases de données MySQL</h1>  
        <?php
            // constantes pour la connexion
              $servername = 'localhost';
              $dbname = 'projet_chopes_ton_stage';
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
            
            //On établit la connexion
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,[
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ /*PDO::FETCH_OBJ utile pour nettoyer le retour des queries*/
            ]);

            $error = null;
            
            try{
              if(isset($_POST['NomPil'], $_POST['NatPil'], $_POST['NoTV'])){
                $query = $conn->prepare('UPDATE pilote SET NomPil = :NomPil, NatPil = :NatPil, NoTV = :NoTV WHERE NoPil = :id');
                $query->execute([
                  'NomPil' => $_POST['NomPil'],
                  'NatPil' => $_POST['NatPil'],
                  'NoTV' => $_POST['NoTV'],
                  'id' => $_GET['id']
                ]);
              }
              $query = $conn->prepare("SELECT * FROM pilote WHERE NoPil = :id");/*création de la requete*/
              $query->execute([
              'id' => $_GET['id']
              ]);
              $post = $query->fetch();
            } catch(PDOException $e){
              $error = $e->getMessage();
            }
        ?>
        <div class="container">
          <form action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="NomPil" value="<?= htmlentities($post->NomPil) ?>">
            </div>
             <br>
            <div class="form-group">
              <input type="text" class="form-control" name="NatPil" value="<?= htmlentities($post->NatPil) ?>">
            </div>
            <br>
            <div class="form-group">
              <input type="text" class="form-control" name="NoTV" value="<?= htmlentities($post->NoTV) ?>">
            </div>
            <button class="btn btn-primary">Sauvegarder</button>
          </form>
        </div>
        </div>

    </body>
</html>

