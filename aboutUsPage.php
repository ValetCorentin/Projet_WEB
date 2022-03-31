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
  <?php $data = json_decode($_COOKIE['user_profil'], true);

   // NAVBAR
    @require_once 'navbar.php';
    
    ?>

    <div id="logo-cesi">
        <div style="position:absolute;z-index:1">
           <img src="./images/logo-cesi.jpg">
        </div>
    </div>
    <p>
        <h1 class='header_propos'>A propos de nous :</h1>
    </p>
	  
	
    <h2 class='header_propos'>
		Qui sommes nous ?
    </h2>    
    <p class='paragraphe'>
		Nous sommes une petite équipe de 5 développeurs web étudiant à CESI et nous avons décidé de créer ce site.
	  </p>

    <div id="campus">
        <div style="position:absolute;z-index: 1;">
           <img src="./images/campus-cesi.jpg">
        </div>
    </div>

    
      <h2 class='header_propos'>	
          Pourquoi faisons nous ça ?
      </h2>    
      <p class='paragraphe'>
          Frustré de nos expériences personnel avec les autres site internet qui relayaient les offres de stage, souvent imprécise, parfois avec des offres en doublon ou pire de fausses offres.
          Nous avons donc décider de créer ce site où notre objectif sera de répertorier le plus d’offre possible et précise, sans doublons et avec toute les information que l’utilisateur aurai besoin.
      </p>
    

    
      <h2 class='header_propos'>	
          Nos objectifs
      </h2>    
      <p class='paragraphe'>
        Notre objectif principale et la transparence ! toutes les offres seront étudié pour leur fiabilité avant d’être poster sur “Chopes ton stage !”
      </p>
    

    
    <h2 class='header_propos'>	
		Nos espoirs
    </h2>    
    <p class='paragraphe'>
		Notre espoirs avec ce site c’est d’aider les particulier dans leur recherche de stage pour que ces derniers puissent acquérir les bonnes connaissances pour avoir le métier de leur rêves!
    </p>

<?php
  @require_once 'footer.php';
?>
  

    <!-- Script -->
    <script src="./js/js.js"></script>
</body>
</html>