<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Authentification</title>
</head>
<body>
  <main id="main-box">
    <!-- <img src="logo.png" alt="logo" style="width:100px; margin:12px;"> -->
    <div id="authentification-box" style="margin:12px;">
      <h1 id="authentification-title">S'authentifier :</h1>
      <br>
      <form action="" method="post" id="spacing">
        <label for="login">Identifiant :</label>
        <input type="text" name="login" placeholder="JeanMiDu13">
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" placeholder="Identifiant">
        <br>
        <button id="connect-button">
          Se connecter
        </button>
        </form>
    </div>
  </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>