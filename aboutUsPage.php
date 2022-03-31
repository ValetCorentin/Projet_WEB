<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chopes ton stage</title>
    <link rel="stylesheet" href="scss/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>
<body>
  <?php $data = json_decode($_COOKIE['user_profil'], true); ?>

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
          <li class="navbar-item has-submenu">
            <a tabindex="0">Bureau</a>
            <ul class="navbar-submenu">
              <?php if($data['Modif_company']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Modifier</a></li>');
                };?>
                <?php if($data['Del_company']==1){ 
                echo('<li class="navbar-subitem"><a href="commingSoonPage.html">Supprimer</a></li>');
                };?>
              <?php if($data['Create_company']==1){ 
                echo('<li class="navbar-subitem"><a href="createOffice.php">Créer</a></li>');
                };?>
            </ul>
          </li>
          <li class="navbar-item">
            <a href="disconnect.php" class="navbar-item">Déconnexion</a>
          </li>

            <li class="navbar-toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
            
        </ul>
        
        
      </nav>
    </header>

    <div id="logo-cesi">
        <div style="position:absolute;z-index:1">
           <img src="logo-cesi.jpg">
        </div>
    </div>
    <p>
        <h1>A propos de nous :</h1>
    </p>
	  
	
    <h2>
		Qui sommes nous ?
    </h2>    
    <p>
		Nous sommes une petite équipe de 5 développeurs web étudiant à CESI et nous avons décidé de créer ce site.
	  </p>

    <div id="campus">
        <div style="position:absolute;z-index: 1;">
           <img src="campus-cesi.jpg">
        </div>
    </div>

    
      <h2>	
          Pourquoi faisons nous ça ?
      </h2>    
      <p>
          Frustré de nos expériences personnel avec les autres site internet qui relayaient les offres de stage, souvent imprécise, parfois avec des offres en doublon ou pire de fausses offres.
          Nous avons donc décider de créer ce site où notre objectif sera de répertorier le plus d’offre possible et précise, sans doublons et avec toute les information que l’utilisateur aurai besoin.
      </p>
    

    
      <h2>	
          Nos objectifs
      </h2>    
      <p>
        Notre objectif principale et la transparence ! toutes les offres seront étudié pour leur fiabilité avant d’être poster sur “Chopes ton stage !”
      </p>
    

    
    <h2>	
		Nos espoirs
    </h2>    
    <p>
		Notre espoirs avec ce site c’est d’aider les particulier dans leur recherche de stage pour que ces derniers puissent acquérir les bonnes connaissances pour avoir le métier de leur rêves!
    </p>

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
          <p id="footer-center-things">Mentions Légales - <a id="footer-apropos" href="aboutUsPage.php">A propos de nous</a></p>
      </div>
  </footer>
  

    <!-- Script -->
    <script src="./js/js.js"></script>
</body>
</html>