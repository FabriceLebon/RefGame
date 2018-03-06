<?php
    session_start();
    include_once '../lib/fonctions.php';
    include_once '../lib/base.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Detail jeu</title>
</head>
<body>
    <?php  if (!user_verified()) { ?> 
        <div id="connexion">
            <form action="/index.php" method="post">
                Veuillez saisir votre login et mot de passe :<br/>
                <input type="text" name="login" placeholder="Pseudo:" /><br />
                <input type="password" name="pwd" placeholder="mot de passe:" /><br/>
                <input type="submit" value="Go" />
            </form>
        </div>
    <?php 
      } else {
      include_once 'Menu.php';
     ?>
        <div id="Detail">
        id jeu : 
        </div>
    <?php 
    }
    ?>
</body>
</html>
