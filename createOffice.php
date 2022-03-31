<!doctype html>
<html lang="fr">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Links -->
    <link rel="stylesheet" href="./scss/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


    <title>Chopes ton stage</title>
</head>

<body id="createOffice-body">
    <?php       
        $data = json_decode($_COOKIE['user_profil'], true);
    // NAVBAR
    @require_once 'navbar.php';
    
    ?>

    <!-- Main -->
    <main id="createOffice-main">
        <h1>Création d'un bureau</h1>
        <hr class="rod" />
        <!-- action à implémenter -->
        <form id="createOffice-form" action="" name="Company_form" method="post">
            <div id="company_name_and_siren">

                <div id="box">
                    <label for="domain-selector">Domaine :</label>
                    <input list="domains" name="Activity_sector_name" class="research-input" placeholder="Choisissez un domaine ">
                    <?php
                    $servername = 'localhost';
                    $dbname = 'projet_web';
                    $username = 'root';
                    $password = '';

                    //Etablishing connexion
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ /*PDO::FETCH_OBJ utile pour nettoyer le retour des queries*/
                    ]);

                    $query = $conn->query("SELECT * FROM Activity_sector");
                    if ($query === false) {
                        var_dump($conn->errorInfo());
                        die('Erreur SQL');
                    }

                    $posts = $query->fetchAll(); ?>
                    <datalist id="domains">
                        <?php foreach ($posts as $post) : ?>
                            <option value="<?= htmlentities($post->Activity_sector_name) ?>">
                            <?php endforeach ?>
                    </datalist>

                </div>
                <div id="box">

                    <label for="SIRET">Numéro de SIRET</label>
                    <input type="text" name="SIRET" id="SIRET_Input" placeholder="ex:30245619900015" />
                </div>

                <div id="box">
                    <label for="datalist_SIREN">Numéro de SIREN :</label>
                    <input list="datalist_SIREN" name="SIREN" class="research-input" placeholder="Choisissez un SIREN ">
                    <?php
                    $servername = 'localhost';
                    $dbname = 'projet_web';
                    $username = 'root';
                    $password = '';

                    //Etablishing connexion
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ /*PDO::FETCH_OBJ utile pour nettoyer le retour des queries*/
                    ]);

                    $query = $conn->query("SELECT SIREN FROM Company;");
                    if ($query === false) {
                        var_dump($conn->errorInfo());
                        die('Erreur SQL');
                    }

                    $posts = $query->fetchAll();
                    ?>

                    <datalist id="datalist_SIREN">
                        <?php foreach ($posts as $post) : ?>
                            <option value="<?= htmlentities($post->SIREN) ?>">
                            <?php endforeach; ?>

                    </datalist>

                </div>
                <div id="box">

                    <label for="Number_trainee">Nombre d'employé</label>
                    <input type="text" name="Number_trainee" id="Number_trainee_Input" placeholder="ex: 150" />
                </div>
                <div id="box">

                    <label for="Office_grade">Note</label>
                    <input type="text" name="Office_grade" id="Office_grade_Input" placeholder="ex: 5" />
                </div>
                <div id="box">

                    <label for="Country">Pays</label>
                    <input type="text" name="Country" id="Country_Input" placeholder="ex: France" />
                </div>
                <div id="box">

                    <label for="City">Ville</label>
                    <input type="text" name="City" id="City_Input" placeholder="ex: Rouen" />
                </div>
                <div id="box">

                    <label for="Zip_code">Code postal</label>
                    <input type="text" name="Zip_code" id="Zip_code_Input" placeholder="ex: 76000" />
                </div>
                <div id="box">

                    <label for="Address">Adresse</label>
                    <input type="text" name="Address" id="Address_Input" placeholder="ex: 154 rue de léon" />
                </div>
                <div id="box">

                    <label for="Region">Région</label>
                    <input type="text" name="Region" id="Region_Input" placeholder="ex: Normandie" />
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


            if (isset($_POST["Activity_sector_name"], $_POST["SIRET"], $_POST["Number_trainee"], $_POST["Office_grade"], $_POST["Country"], $_POST["City"], $_POST["Zip_code"], $_POST["Address"], $_POST["Region"])) {
                $Activity_sector_name = $_POST["Activity_sector_name"];
                $SIRET = $_POST["SIRET"];
                $SIREN = $_POST["SIREN"];
                $Number_trainee = $_POST["Number_trainee"];
                $Office_grade = $_POST["Office_grade"];
                $Country = $_POST["Country"];
                $City = $_POST["City"];
                $Zip_code = $_POST["Zip_code"];
                $Address = $_POST["Address"];
                $Region = $_POST["Region"];


                //creating prepared query
                $query = $conn->prepare("INSERT INTO address (Locality_ID, Country, City, Zip_code, address, Region) 
                VALUES (NULL, :Country, :City, :Zip_code, :Address, :Region);
                
                INSERT INTO office (SIRET, Number_trainee, Office_grade, SIREN, Locality_ID) 
                VALUES (:SIRET, :Number_trainee, :Office_grade, (SELECT SIREN FROM company WHERE company.SIREN = :SIREN), (SELECT MAX(address.Locality_ID) FROM address));
                    
                INSERT INTO is_part_of (SIRET, Activity_sector_name) 
                VALUES ((SELECT SIRET FROM office WHERE office.SIRET = :SIRET), :Activity_sector_name);");/*création de la requete*/

                $query->bindParam(':Activity_sector_name', $Activity_sector_name);
                $query->bindParam(':SIRET', $SIRET);
                $query->bindParam(':SIREN', $SIREN);
                $query->bindParam(':Number_trainee', $Number_trainee);
                $query->bindParam(':Office_grade', $Office_grade);
                $query->bindParam(':Country', $Country);
                $query->bindParam(':City', $City);
                $query->bindParam(':Zip_code', $Zip_code);
                $query->bindParam(':Address', $Address);
                $query->bindParam(':Region', $Region);

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