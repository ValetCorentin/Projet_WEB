<?php 
  unset($_COOKIE['user_profil']);
  setcookie('user_profil', '', time() - 3600);
   header("LOCATION: http://localhost/Projet_WEB/index.php");
?>