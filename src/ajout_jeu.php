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
        <div id="AjoutJeuR">
            <?php  if (verifChampRempli($_POST['nom'])) {     
                $recherche = $_POST['nom'];
                $url = "http://www.giantbomb.com/api/search?api_key=b6923e1c4d2e70b5b8291923aff409db9d116104&format=json&query=".$recherche."&resources=game&field_list=id,name&limit=50";
                $raw = file_get_contents($url);
                $json = json_decode($raw);   
                 
                if(!empty($json->results)) {
                    foreach($json->results as $msg) {
                            echo "<u>" . $msg->id ."</u> : " . $msg->name;
                             echo "<br />";
                    }
                } else {
                    echo "Rien n'a &eacute;t&eacute; trou&eacute;.";
                }    
             } ?>
            <br/><br/><a href="ajout_jeu.php">Ajouter un jeu</a><br />
        </div>
     <?php 
    }
    ?>
</body>
</html>