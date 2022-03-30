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
  <body id="createProfile-body">
<!-- Header with navbar -->
<header>
      <nav class="navbar">
        <ul class="navbar-menu">
          <li class="navbar-logo"><a href="index.php">Chopes ton stage</a></li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Rechercher</a>
            <ul class="navbar-submenu">
            <?php if($data['LF_offer']==1){ 
                echo('<li class="navbar-subitem"><a href="index.php">Stages</a></li>');
                };?>
                <?php if($data['LF_company']==1){ 
                echo('<li class="navbar-subitem"><a href="companyPage.php">Entreprises</a></li>');
                };?>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Favoris</a>
            <ul class="navbar-submenu">
              <?php if($data['To_apply']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Offres postulées</a></li>');
                };?>
              <?php if($data['Add_to_wishlist']==1){ 
                echo('<li class="navbar-subitem"><a href="wishlistPage.php">Wishlist</a></li>');
                };?>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Statistiques</a>
            <ul class="navbar-submenu">
              <li class="navbar-subitem"><a href="commingSoonPage.html">Profils</a></li>
              <li class="navbar-subitem"><a href="commingSoonPage.html">Entreprises</a></li>
              <li class="navbar-subitem"><a href="commingSoonPage.html">Stages</a></li>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Stages</a>
            <ul class="navbar-submenu">
              <?php if($data['Modif_offer']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Modifier</a></li>');
                };?>
              <?php if($data['Del_offer']==1){ 
                echo('<li class="navbar-subitem"><a href="listSuppOffer.php">Supprimer</a></li>');
                };?>
              <?php if($data['Create_offer']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Créer</a></li>');
                };?>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Profils</a>
            <ul class="navbar-submenu">
              <?php if($data['Modif_student']==1 || $data['Modif_representative']==1 || $data['Modif_pilot']==1) { 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Modifier</a></li>');
                };?>
              <?php if($data['Del_student']==1 || $data['Del_representative']==1 || $data['Del_pilot']==1){ 
                echo('<li class="navbar-subitem"><a href="listSuppProfile.php">Supprimer</a></li>');
                };?>
              <?php if($data['Create_student']==1 || $data['Create_representative']==1 || $data['Create_pilot']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Créer</a></li>');
                };?>
            </ul>
          </li>
          <li class="navbar-item has-submenu">
            <a tabindex="0">Entreprises</a>
            <ul class="navbar-submenu">
              <?php if($data['Modif_company']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Modifier</a></li>');
                };?>
                <?php if($data['Del_company']==1){ 
                echo('<li class="navbar-subitem"><a href="listSuppCompany.php">Supprimer</a></li>');
                };?>
              <?php if($data['Create_company']==1){ 
                echo('<li class="navbar-subitem"><a href="createCompany.php">Créer</a></li>');
                };?>
            </ul>
          </li>
          <a href="disconnect.php" class="navbar-item">Déconnexion</a>

            <li class="navbar-toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
            
        </ul>
        
        
      </nav>
    </header>


    <main id="createProfile-main">
      <h1>Création de profil</h1createProfile-form>
      <hr/>

      <!-- action à implémenter -->
      <form id="createProfile-form" action="" name="Profil_creation_form" method="post">
        <div id="login_and_password_box">
          <div id="Login_ID_box">
            <!-- Login ID -->
            <label for="Login_ID">Identifiant de connexion</label>
            <input type="text" name="Login_ID" id="Login_ID_Input" />
          </div>

          <div id="Password_box">
            <!-- Password -->
            <label for="Login_Password">Mot de passe</label>
            <input
              type="password"
              name="Login_Password"
              id="Login_ID_Input"
              minlength="8"
              placeholder="8 caractères minimum"
            />
          </div>
        </div>

        <div id="Surname_box">
          <!-- Surname -->
          <label for="Surname">Nom</label>
          <input type="text" name="Surname" id="Surname_Input" required />
        </div>

        <div id="Name_box">
          <!-- Name -->
          <label for="Name">Prénom</label>
          <input type="text" name="Name" id="Name_Input" required />
        </div>

        <div id="E-mail_box">
          <!-- E-mail -->
          <label for="E-mail">E-mail</label>
          <input type="email" name="E-mail" id="E-mail_Input" required />
        </div>

        <div id="Profile_type_box">
          <!-- Profile type -->
          <label for="Profil_type">Type de profil</label>
          <select
            type="text"
            name="Profil_type"
            id="Profil_type_Input"
            required
          >
            <option value="" disabled selected>Choisissez un profil</option>
            <option value="Administrator">Admnistrateur</option>
            <option value="Pilot">Pilote</option>
            <option value="Student">Étudiant</option>
            <option value="Delegate">Délégué</option>
          </select>
        </div>

        <div id="Country_box">
          <label for="Country">Pays</label>
          <input type="text" name="Country" id="Country_Input" required />
        </div>

        <div id="Region_box">
          <label for="Region">Région</label>
          <input type="text" name="Region" id="Region_Input" required />
        </div>

        <div id="City_box">
          <label for="City">Ville</label>
          <input type="text" name="City" id="City_Input" required />
        </div>

        <div id="ZIP_Code_box">
          <label for="ZIP_Code">Code Postal</label>
          <input type="text" name="ZIP_Code" id="ZIP_Code_Input" required />
        </div>

        <div id="Address_box">
          <label for="Address">Adresse</label>
          <input type="text" name="Address" id="Address_Input" required />
        </div>
      </form>
    </main>


                                        <!-- Footer -->
    <footer>
      <div class="footer-trait" id="footer-center-things">
          <HR ALIGN=CENTER WIDTH="800">
      </div>
          <p id="footer-center-things">Notre équipe :</p>

      <div id="footer-center-things">
          <div id="footer-member">
              <a href="https://github.com/Didicap" target="_blank"><img id="footer-pp" src="images/Odric.png" alt="noPP"></a>
              <br>
              <p>Audric CAPET</p>
          </div>
          <div id="footer-member">
              <a href="https://www.linkedin.com/in/mathieu-gu%C3%A9nier-a513a0215/" target="_blank"><img id="footer-pp" src="images/M.png" alt="noPP"></a>
              <br>
              <p>Mathieu GUENIER</p>
          </div>
          <div id="footer-member">
              <a href="https://github.com/Mattken12" target="_blank"><img id="footer-pp" src="images/matteo.png" alt="noPP"></a>
              <br>
              <p>Mattéo FAUVEL</p>
          </div>
          <div id="footer-member">
              <a href="https://github.com/P3mast" target="_blank"><img id="footer-pp" src="images/Olivier.png" alt="noPP"></a>
              <br>
              <p>Olivier GOSSET</p>
          </div>
              
          <div id="footer-member">
              <a href="https://github.com/VALET-Corentin" target="_blank"><img id="footer-pp" src="images/Coco.png" alt="noPP"></a>
              <br>
              <p>Corentin VALET</p>
          </div>
      </div>
      <div class="footer-legal">
          <p id="footer-center-things">2022</p>
          <p id="footer-center-things">Mentions Légales - <a id="footer-apropos" href="#">A propos de nous</a></p>
      </div>
  </footer>

    <!-- Script -->
    <script src="/js/js.js"></script>
  </body>
</html>