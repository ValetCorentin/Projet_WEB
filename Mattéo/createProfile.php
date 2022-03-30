<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chopes ton stage - Création de profil</title>
  <link rel="stylesheet" href="Style/style.css" />
  <?php @require_once './DataBaseConnection.php'; ?>
</head>

<body>
  <header>

    <!-- NAVBAR A IMPLEMENTER -->

  </header>
  <main>
    <h1>Création de profil</h1>
    <hr />

    <!-- action à implémenter -->
    <form action="" name="Profil_creation_form" method="post">
      <div class="div-box" id="login_and_password_box">
        <div class="div-box-input" id="Login_ID_box">
          <!-- Login ID -->
          <label for="Login_ID">Identifiant de connexion</label>
          <input type="text" name="Login_ID" id="Login_ID_Input" required />
        </div>

        <div class="div-box-input" id="Password_box">
          <!-- Password -->
          <label for="Login_Password">Mot de passe</label>
          <input type="password" name="Login_Password" id="Login_Password_Input" minlength="8" placeholder="8 caractères minimum" required />
        </div>
      </div>
      <div class="div-box" id="Surname_Name_box">
        <div class="div-box-input" id="Surname_box">
          <!-- Surname -->
          <label for="Surname">Nom</label>
          <input type="text" name="Surname" id="Surname_Input" required />
        </div>

        <div class="div-box-input" id="Name_box">
          <!-- Name -->
          <label for="Name">Prénom</label>
          <input type="text" name="Name" id="Name_Input" required />
        </div>
      </div>

      <div class="div-box-input" id="E-mail_box">
        <!-- E-mail -->
        <label for="E-mail">E-mail</label>
        <input type="email" name="E-mail" id="E-mail_Input" required />
      </div>

      <div class="div-box-input" id="Profile_type_box">
        <!-- Profile type -->
        <label for="Profile_type">Type de profil</label>
        <select type="text" name="Profile_type" id="Profil_type_Input" required>
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
          <input type="checkbox" name="Enterprise_search" id="delegate_right_1" class="delegate_rights_checkboxes" /><label for="Enterprise_search">Rechercher une entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Create_enterprise" id="delegate_right_2" class="delegate_rights_checkboxes" /><label for="Create_enterprise">Créer une entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Enterprise_modif" id="delegate_right_3" class="delegate_rights_checkboxes" /><label for="Enterprise_modif">Modifier une entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Enterprise_evaluation" id="delegate_right_4" class="delegate_rights_checkboxes" /><label for="Enterprise_evaluation">Évaluer une entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Enterprise_delete" id="delegate_right_5" class="delegate_rights_checkboxes" /><label for="Enterprise_delete">Supprimer une entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Enterprise_stats_check" id="delegate_right_6" class="delegate_rights_checkboxes" /><label for="Enterprise_stats_check">Consulter les stats de l'entreprise</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Offer_search" id="delegate_right_7" class="delegate_rights_checkboxes" /><label for="Offer_search">Rechercher une offre</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Offer_create" id="delegate_right_8" class="delegate_rights_checkboxes" /><label for="Offer_create">Créer une offre</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Offer_modif" id="delegate_right_9" class="delegate_rights_checkboxes" /><label for="Offer_modif">Modifier une offre</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Offer_delete" id="delegate_right_10" class="delegate_rights_checkboxes" /><label for="Offer_delete">Supprimer une offre</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Offer_stats_check" id="delegate_right_11" class="delegate_rights_checkboxes" /><label for="Offer_stats_check">Consulter les stats des offres</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Pilot_search" id="delegate_right_12" class="delegate_rights_checkboxes" /><label for="Pilot_search">Rechercher un compte pilote</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Create_pilot" id="delegate_right_13" class="delegate_rights_checkboxes" /><label for="Create_pilot">Créer un compte pilote</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Pilot_modif" id="delegate_right_14" class="delegate_rights_checkboxes" /><label for="Pilot_modif">Modifier le compte pilote</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Pilot_delete" id="delegate_right_15" class="delegate_rights_checkboxes" /><label for="Pilot_delete">Supprimer un compte pilote</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Delegate_search" id="delegate_right_16" class="delegate_rights_checkboxes" /><label for="Delegate_search">Rechercher un compte délégué</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Create_delegate" id="delegate_right_17" class="delegate_rights_checkboxes" /><label for="Create_delegate">Créer un compte délégué</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Delegate_modif" id="delegate_right_18" class="delegate_rights_checkboxes" /><label for="Delegate_modif">Modifier un compte délégué</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Delegate_delete" id="delegate_right_19" class="delegate_rights_checkboxes" /><label for="Delegate_delete">Supprimer un compte délégué</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Student_search" id="delegate_right_20" class="delegate_rights_checkboxes" /><label for="Student_search">Rechercher un compte étudiant</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Create_student" id="delegate_right_21" class="delegate_rights_checkboxes" /><label for="Create_student">Créer un compte étudiant</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Student_modif" id="delegate_right_22" class="delegate_rights_checkboxes" /><label for="Student_modif">Modifier un compte étudiant</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Student_delete" id="delegate_right_23" class="delegate_rights_checkboxes" /><label for="Student_delete">Supprimer un compte étudiant</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Student_stats_check" id="delegate_right_24" class="delegate_rights_checkboxes" /><label for="Student_stats_check">Consulter les stats des étudiants</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Step_info_3" id="delegate_right_25" class="delegate_rights_checkboxes" /><label for="Step_info_3">Informer le système de l'avancement de la candidature step
            3</label>
        </div>

        <div class="delegate_right_checkbox">
          <input type="checkbox" name="Step_info_4" id="delegate_right_26" class="delegate_rights_checkboxes" /><label for="Step_info_4">Informer le système de l'avancement de la candidature step
            4</label>
        </div>
      </div>

      <div class="div-box-input" id="Training_center_box">
        <!-- Training center -->
        <label for="Training_center">Centre de formation</label>
        <input type="text" name="Training_center" class="student_form_properties" id="Training_center_Input" required disabled />

        <div class="div-box-input" id="Training_center_promotion_box">
          <!-- Training center promotion -->
          <label for="Training_center_promotion">Promotion de l'étudiant</label>
          <input type="text" name="Training_center_promotion" class="student_form_properties" id="Training_center_promotion_Input" required />
        </div>
      </div>

      <div class="div-box-input" id="Country_box">
        <!-- Country -->
        <label for="Country">Pays</label>
        <input type="text" name="Country" id="Country_Input" required />
      </div>

      <div class="div-box-input" id="Region_box">
        <!-- Region -->
        <label for="Region">Région</label>
        <input type="text" name="Region" id="Region_Input" required />
      </div>

      <div class="div-box-input" id="ZIP_Code_box">
        <!-- ZIP_Code -->
        <label for="ZIP_Code">Code Postal</label>
        <input type="text" name="ZIP_Code" id="ZIP_Code_Input" required />
      </div>

      <div class="div-box-input" id="City_box">
        <!-- City -->
        <label for="City">Ville</label>
        <input type="text" name="City" id="City_Input" required />
      </div>

      <div class="div-box-input" id="Address_box">
        <!-- Address -->
        <label for="Address">Adresse</label>
        <input type="text" name="Address" id="Address_Input" required />
      </div>

      <!-- Submit Button -->
      <button type="submit" class="div-box-input" id="button-submit_form">
        Créer
      </button>
    </form>
  </main>
  <script src="./script_CreateProfile.js"></script>
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
  $Promotion_name_Input = $_POST["Training_center_promotion"];

  $Country_Input = $_POST["Country"];
  $Region_Input = $_POST["Region"];
  $ZIP_Code_Input = $_POST["ZIP_Code"];
  $City_Input = $_POST["City"];
  $Address_Input = $_POST["Address"];

  if ($Profile_type_Input === 'Administrator') {

    // Creation query to create an admin profile

  } else if ($Profile_type_Input === 'Pilot') {

    // Creation query to create a pilot profile

  } else if ($Profile_type_Input === 'Student') {

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
    $recipeStatement->execute(array('Country_Input' => $Country_Input, 'City_Input' => $City_Input, 'ZIP_Code_Input' => $ZIP_Code_Input, 'Address_Input' => $Address_Input, 'Region_Input' => $Region_Input, 'Name_Input' => $Name_Input, 'Surname_Input' => $Surname_Input, 'Login_Input' => $Login_Input, 'Password_Input' => $Password_Input, 'E_mail_Input' => $E_mail_Input, 'Profile_type_Input' => $Profile_type_Input, 'Training_center_name_Input' => $Training_center_name_Input ,'Promotion_name_Input' => $Promotion_name_Input));

  } else if ($Profile_type_Input === 'Delegate') {

    // Creation query to create a delegate profile

  }
}


?>