<?php
    session_start();
    include_once '../lib/fonctions.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Recherche</title>
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
        <div id="AjoutJeu">
            <form action="" method="post">
                Entrer le jeu a ajouter : 
                <br/>nom : <input type="text" name="nom" id="nom_Jeu"><br />
                <input type="submit" value="ajouter">
            </form>
        </div>
     <?php 
    }
    ?>
</body>
</html>