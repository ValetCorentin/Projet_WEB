<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chopes ton stage - Création de profil</title>
  <link rel="stylesheet" href="Style/sass.css" />
  <?php @require_once './DataBaseConnection.php'; ?>
</head>

<body class="body-content">
  <header>

    <!-- NAVBAR A IMPLEMENTER -->

  </header>
  <main class="main-content">
    <h1 class="h1-content">Création de profil</h1>
    <hr class="hr-content"/>

    <!-- action à implémenter -->
    <form class="form-profile-creation" action="" name="Profil_creation_form" method="post">
      <div class="div-box" id="login_and_password_box">
        <div class="div-box-input" id="Login_ID_box">
          <!-- Login ID -->
          <label class="label-content" for="Login_ID">Identifiant de connexion</label>
          <input class="input-box" type="text" name="Login_ID" id="Login_ID_Input" required />
        </div>

        <div class="div-box-input" id="Password_box">
          <!-- Password -->
          <label class="label-content" for="Login_Password">Mot de passe</label>
          <input class="input-box" type="password" name="Login_Password" id="Login_Password_Input" minlength="8" placeholder="8 caractères minimum" required />
        </div>
      </div>
      <div class="div-box" id="Surname_Name_box">
        <div class="div-box-input" id="Surname_box">
          <!-- Surname -->
          <label class="label-content" for="Surname">Nom</label>
          <input class="input-box" type="text" name="Surname" id="Surname_Input" required />
        </div>

        <div class="div-box-input" id="Name_box">
          <!-- Name -->
          <label class="label-content" for="Name">Prénom</label>
          <input class="input-box" type="text" name="Name" id="Name_Input" required />
        </div>
      </div>

      <div class="div-box-input" id="E-mail_box">
        <!-- E-mail -->
        <label class="label-content" for="E-mail">E-mail</label>
        <input class="input-box" type="email" name="E-mail" id="E-mail_Input" required />
      </div>

      <div class="div-box-input" id="Profile_type_box">
        <!-- Profile type -->
        <label class="label-content" for="Profile_type">Type de profil</label>
        <select class="select-box" type="text" name="Profile_type" id="Profil_type_Input" required>
          <option value="" disabled selected>Choisissez un profil</option>
          <option value="Administrator">Administrateur</option>
          <option value="Pilot">Pilote</option>
          <option value="Student">Étudiant</option>
          <option value="Delegate">Délégué</option>
        </select>
      </div>

      <div class="div-box-input" id="Delegate_rights">
        <!-- Delegate Rights -->
        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Enterprise_search" id="delegate_right_1" class="delegate_rights_checkboxes" /><label class="label-content" for="Enterprise_search">Rechercher une entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Create_enterprise" id="delegate_right_2" class="delegate_rights_checkboxes" /><label class="label-content" for="Create_enterprise">Créer une entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Enterprise_modif" id="delegate_right_3" class="delegate_rights_checkboxes" /><label class="label-content" for="Enterprise_modif">Modifier une entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Enterprise_evaluation" id="delegate_right_4" class="delegate_rights_checkboxes" /><label class="label-content" for="Enterprise_evaluation">Évaluer une entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Enterprise_delete" id="delegate_right_5" class="delegate_rights_checkboxes" /><label class="label-content" for="Enterprise_delete">Supprimer une entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Enterprise_stats_check" id="delegate_right_6" class="delegate_rights_checkboxes" /><label class="label-content" for="Enterprise_stats_check">Consulter les stats de l'entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Offer_search" id="delegate_right_7" class="delegate_rights_checkboxes" /><label class="label-content" for="Offer_search">Rechercher une offre</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Offer_create" id="delegate_right_8" class="delegate_rights_checkboxes" /><label class="label-content" for="Offer_create">Créer une offre</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Offer_modif" id="delegate_right_9" class="delegate_rights_checkboxes" /><label class="label-content" for="Offer_modif">Modifier une offre</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Offer_delete" id="delegate_right_10" class="delegate_rights_checkboxes" /><label class="label-content" for="Offer_delete">Supprimer une offre</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Offer_stats_check" id="delegate_right_11" class="delegate_rights_checkboxes" /><label class="label-content" for="Offer_stats_check">Consulter les stats des offres</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Pilot_search" id="delegate_right_12" class="delegate_rights_checkboxes" /><label class="label-content" for="Pilot_search">Rechercher un compte pilote</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Create_pilot" id="delegate_right_13" class="delegate_rights_checkboxes" /><label class="label-content" for="Create_pilot">Créer un compte pilote</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Pilot_modif" id="delegate_right_14" class="delegate_rights_checkboxes" /><label class="label-content" for="Pilot_modif">Modifier le compte pilote</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Pilot_delete" id="delegate_right_15" class="delegate_rights_checkboxes" /><label class="label-content" for="Pilot_delete">Supprimer un compte pilote</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Delegate_search" id="delegate_right_16" class="delegate_rights_checkboxes" /><label class="label-content" for="Delegate_search">Rechercher un compte délégué</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Create_delegate" id="delegate_right_17" class="delegate_rights_checkboxes" /><label class="label-content" for="Create_delegate">Créer un compte délégué</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Delegate_modif" id="delegate_right_18" class="delegate_rights_checkboxes" /><label class="label-content" for="Delegate_modif">Modifier un compte délégué</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Delegate_delete" id="delegate_right_19" class="delegate_rights_checkboxes" /><label class="label-content" for="Delegate_delete">Supprimer un compte délégué</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Student_search" id="delegate_right_20" class="delegate_rights_checkboxes" /><label class="label-content" for="Student_search">Rechercher un compte étudiant</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Create_student" id="delegate_right_21" class="delegate_rights_checkboxes" /><label class="label-content" for="Create_student">Créer un compte étudiant</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Student_modif" id="delegate_right_22" class="delegate_rights_checkboxes" /><label class="label-content" for="Student_modif">Modifier un compte étudiant</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Student_delete" id="delegate_right_23" class="delegate_rights_checkboxes" /><label class="label-content" for="Student_delete">Supprimer un compte étudiant</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Student_stats_check" id="delegate_right_24" class="delegate_rights_checkboxes" /><label class="label-content" for="Student_stats_check">Consulter les stats des étudiants</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Step_info_3" id="delegate_right_25" class="delegate_rights_checkboxes" /><label class="label-content" for="Step_info_3">Informer le système de l'avancement de la candidature step
            3</label>
        </div>

        <div class="delegate_right_checkbox">
          <input class="input-box" type="checkbox" name="Step_info_4" id="delegate_right_26" class="delegate_rights_checkboxes" /><label class="label-content" for="Step_info_4">Informer le système de l'avancement de la candidature step
            4</label>
        </div>
      </div>

      <div class="div-box-input" id="Training_center_box">
        <div class="div-box-input" id="Training_center_name_box">
          <!-- Training center -->
          <label class="label-content" for="Training_center">Centre de formation</label>
          <input class="input-box" list="Training_center_list" type="text" name="Training_center" class="student_form_properties" id="Training_center_Input" required />

          <?php

          $sqlQuery = $conn->query("SELECT Training_center_name FROM training_center;");
          $recipes = $sqlQuery->fetchAll();
          ?>
          <datalist id="Training_center_list">
            <?php
            foreach ($recipes as $recipe) { ?>
              <option value="<?= htmlentities($recipe->Training_center_name) ?>">
              <?php
            }
              ?>
          </datalist>

        </div>
        <div class="div-box-input" id="Training_center_promotion_box">
          <!-- Training center promotion -->
          <label class="label-content" for="Training_center_promotion">Promotion de l'étudiant</label>
          <input class="input-box" type="text" name="Training_center_promotion" class="student_form_properties" id="Training_center_promotion_Input" placeholder="Obligatoire si étudiant" />
        </div>
      </div>

      <div class="div-box-input" id="Country_box">
        <!-- Country -->
        <label class="label-content" for="Country">Pays</label>
        <input class="input-box" type="text" name="Country" id="Country_Input" required />
      </div>

      <div class="div-box-input" id="ZIP_Code_box">
        <!-- ZIP_Code -->
        <label class="label-content" for="ZIP_Code">Code Postal</label>
        <input class="input-box" type="text" maxlength="5" name="ZIP_Code" id="ZIP_Code_Input" required />
      </div>

      <div class="div-box-input" id="City_box">
        <!-- City -->
        <label class="label-content" for="City">Ville</label>
        <input class="input-box" list="City_list" type="text" name="City" id="City_Input" required />
        <datalist id="City_list"></datalist>
      </div>

      <div class="div-box-input" id="Region_box">
        <!-- Region -->
        <label class="label-content" for="Region">Région</label>
        <input class="input-box" type="text" name="Region" id="Region_Input" required />
      </div>

      <div class="div-box-input" id="Address_box">
        <!-- Address -->
        <label class="label-content" for="Address">Adresse</label>
        <input class="input-box" type="text" name="Address" id="Address_Input" required />
      </div>

      <!-- Submit Button -->
      <button type="submit" class="div-box-input" id="button-submit_form">
        Créer
      </button>
    </form>
  </main>
  <script src="./script_CreateProfile.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
</body>

</html>


<?php
if (isset($_POST["Login_ID"])) {

  // Assignation of the values from the form to php variables

  $Login_Input = $_POST["Login_ID"];
  $Password_Input = $_POST["Login_Password"];
  $Surname_Input = $_POST["Surname"];
  $Name_Input = $_POST["Name"];
  $E_mail_Input = $_POST["E-mail"];
  $Profile_type_Input = $_POST["Profile_type"];

  $Training_center_name_Input = $_POST["Training_center"];

  $Country_Input = $_POST["Country"];
  $Region_Input = $_POST["Region"];
  $ZIP_Code_Input = $_POST["ZIP_Code"];
  $City_Input = $_POST["City"];
  $Address_Input = $_POST["Address"];

  if ($Profile_type_Input === 'Administrator' || $Profile_type_Input === 'Pilot') {

    // Creation query to create an admin or pilot profile
    $sqlQuery = "INSERT INTO address VALUES ('NULL', :Country_Input, :City_Input, :ZIP_Code_Input, :Address_Input, :Region_Input);
    INSERT INTO contact VALUES ('NULL', :Name_Input, :Surname_Input, :Login_Input, :Password_Input, :E_mail_Input, :Profile_type_Input, (SELECT MAX(Locality_ID) FROM address), (SELECT Training_center_ID FROM training_center WHERE Training_center_name = :Training_center_name_Input));";



    // Preparing the query then sending it to the database
    $recipeStatement = $conn->prepare($sqlQuery);
    $recipeStatement->execute(array('Country_Input' => $Country_Input, 'City_Input' => $City_Input, 'ZIP_Code_Input' => $ZIP_Code_Input, 'Address_Input' => $Address_Input, 'Region_Input' => $Region_Input, 'Name_Input' => $Name_Input, 'Surname_Input' => $Surname_Input, 'Login_Input' => $Login_Input, 'Password_Input' => $Password_Input, 'E_mail_Input' => $E_mail_Input, 'Profile_type_Input' => $Profile_type_Input, 'Training_center_name_Input' => $Training_center_name_Input));
  } else if ($Profile_type_Input === 'Student') {

    $Promotion_name_Input = $_POST["Training_center_promotion"];
    // Creation query to create a student profile

    // Promotion_name existance query
    $sqlQuery = "SELECT COUNT(*) AS Total FROM Promotion WHERE Promotion_name = :Promotion_name_Input ;";
    $recipeStatement = $conn->prepare($sqlQuery);
    $recipeStatement->execute(array('Promotion_name_Input' => $Promotion_name_Input));

    $recipes = $recipeStatement->fetch();

    // Creation of the query to create a new student profile
    if (($recipes->Total) == 0) {

      // Query used to create a student if his promotion hasn't been created
      $sqlQuery = "INSERT INTO address VALUES ('NULL', :Country_Input, :City_Input, :ZIP_Code_Input, :Address_Input, :Region_Input);
INSERT INTO contact VALUES ('NULL', :Name_Input, :Surname_Input, :Login_Input, :Password_Input, :E_mail_Input, :Profile_type_Input, (SELECT MAX(Locality_ID) FROM address), (SELECT Training_center_ID FROM training_center WHERE Training_center_name = :Training_center_name_Input));
INSERT INTO promotion VALUES ('NULL', :Promotion_name_Input);
INSERT INTO belongs VALUES ((SELECT Promotion_ID FROM promotion WHERE Promotion_name = :Promotion_name_Input), (SELECT MAX(Contact_ID) FROM contact));
INSERT INTO possesses VALUES ((SELECT Training_center_ID from training_center WHERE Training_center_name = :Training_center_name_Input), (SELECT Promotion_ID FROM promotion WHERE Promotion_name = :Promotion_name_Input));";
    } else if (($recipes->Total) > 0) {

      // Query used to create a student if his promotion has been created
      $sqlQuery = "INSERT INTO address VALUES ('NULL', :Country_Input, :City_Input, :ZIP_Code_Input, :Address_Input, :Region_Input);
INSERT INTO contact VALUES ('NULL', :Name_Input, :Surname_Input, :Login_Input, :Password_Input, :E_mail_Input, :Profile_type_Input, (SELECT MAX(Locality_ID) FROM address), (SELECT Training_center_ID FROM training_center WHERE Training_center_name = :Training_center_name_Input));
INSERT INTO belongs VALUES ((SELECT Promotion_ID FROM promotion WHERE Promotion_name = :Promotion_name_Input), (SELECT MAX(Contact_ID) FROM contact));
INSERT INTO possesses VALUES ((SELECT Training_center_ID from training_center WHERE Training_center_name = :Training_center_name_Input), (SELECT Promotion_ID FROM promotion WHERE Promotion_name = :Promotion_name_Input));";
    }

    // Preparing the query then sending it to the database
    $recipeStatement = $conn->prepare($sqlQuery);
    $recipeStatement->execute(array('Country_Input' => $Country_Input, 'City_Input' => $City_Input, 'ZIP_Code_Input' => $ZIP_Code_Input, 'Address_Input' => $Address_Input, 'Region_Input' => $Region_Input, 'Name_Input' => $Name_Input, 'Surname_Input' => $Surname_Input, 'Login_Input' => $Login_Input, 'Password_Input' => $Password_Input, 'E_mail_Input' => $E_mail_Input, 'Profile_type_Input' => $Profile_type_Input, 'Training_center_name_Input' => $Training_center_name_Input, 'Promotion_name_Input' => $Promotion_name_Input));
  } else if ($Profile_type_Input === 'Delegate') {

    // Creation query to create a delegate profile

  }
}


?>