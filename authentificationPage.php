<?php
session_start();
?>

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
    <!-- https://stackoverflow.com/questions/686155/remove-a-cookie -->

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
                <input type="submit" value="Se connecter">
            </form>

            <!-- PHP -->

            <?php

            $servername = 'localhost';
            $dbname = 'projet_web';
            $username = 'root';
            $password = '';

            //Etablishing connexion
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ /*PDO::FETCH_OBJ utile pour nettoyer le retour des queries*/
            ]);

            if (isset($_POST["login"])) {
                $userLogin = $_POST["login"];
                $userPassword = $_POST["password"];

                //creating prepared query
                $query = $conn->prepare("SELECT * FROM contact WHERE Login=:login AND Password=:password");/*création de la requete*/
                $query->bindParam(':login', $userLogin);
                $query->bindParam(':password', $userPassword);

                $query->execute();

                if ($query === false) {
                    var_dump($conn->errorInfo());
                    die('Erreur SQL');
                }


                $posts = $query->fetchAll();

                //checking if there is a result to the query and access to index.php
                if (isset($posts[0])) {
                    header("LOCATION: http://localhost/Projet_WEB/index.php");

                    echo ('<p>Bon mdp/login</p>');
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ /*PDO::FETCH_OBJ utile pour nettoyer le retour des queries*/
                        ]);
                    } catch (PDOException $e) {
                        echo "Pas de co à la BDD";
                    }

                    $query = $conn->prepare(
                        "SELECT First_name, Last_name, Login, Status.Status_name,
                        Permissions.Add_to_wishlist, Permissions.Assign_right, 
                        Permissions.Create_company, Permissions.Create_offer, Permissions.Create_pilot, Permissions.Create_representative, Permissions.Create_student, Permissions.Del_company, Permissions.Del_offer, Permissions.Del_pilot, Permissions.Del_representative, Permissions.Del_student, Permissions.Del_from_wishlist, Permissions.Evaluate_company, Permissions.LF_company, Permissions.LF_offer, Permissions.LF_pilot, Permissions.LF_representative, Permissions.LF_student, Permissions.Modif_company, Permissions.Modif_offer, Permissions.Modif_pilot, Permissions.Modif_representative, Permissions.Modif_student, Permissions.Stat_check_company, Permissions.Stat_check_offer, Permissions.Stat_check_student, Permissions.To_apply
                        FROM contact 
                        LEFT JOIN status ON Contact.Status_name = status.Status_name 
                        LEFT JOIN permissions ON permissions.Permission_ID = status.Permission_ID 
                        WHERE login=:login AND Password=:password;"
                    );/*création de la requete*/
                    $query->bindParam(':login', $userLogin);
                    $query->bindParam(':password', $userPassword);

                    $query->execute();
                    $json = $query->fetch();
                    $data = json_encode($json);
                    echo $data;

                    // Storing cookies
                    setcookie('user_profil', $data, time() + 3600);


                } else {
                    echo ('<p>Erreur dans le login et/ou le mot de passe, réessayez.</p>');
                }
            } else {
                echo 'Renseignez les champs si dessus pour vous identifier.';
            }

            ?>
        </div>
    </main>
</body>

</html>