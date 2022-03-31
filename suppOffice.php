<!DOCTYPE html>
<html>
    <head>
        <title>Connexion DataBase</title>
        <meta charset="utf-8">
    </head>
    <body>
        <!-- Connexion à la base de donnée -->
            <?php
                $data = json_decode($_COOKIE['user_profil'], true);

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

                // On récupère l'ID du profil à supprimer
                $SIRET = $_GET['SIRET'];
                $Locality_ID = $_GET['Locality_ID'];
                $sqlQuery = "DELETE FROM office WHERE SIRET = '$SIRET'; DELETE FROM is_part_of WHERE SIRET = '$SIRET'; DELETE FROM address WHERE Locality_ID = '$Locality_ID';";
                $recipesStatement = $connexion->prepare($sqlQuery);
                $recipesStatement->execute();
                $recipes = $recipesStatement->fetchAll();?>
                <p>Suppression effectuée</p>
                <a href="listsuppoffice.php">Retour aux bureaux</a>
                
    </body>
</html>