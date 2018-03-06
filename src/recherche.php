<?php
    session_start();
    include_once '../lib/fonctions.php';
    include_once '../lib/base.php';
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
        <div id="rechercheQ">
            <form action="" method="post">
                Entrer le jeux a chercher : 
                <input type="text" name="extrait"><br />
                <input type="submit" value="rechercher">
            </form>
        </div>
        <div id="rechercheR">
            <?php  if (verifChampRempli($_POST['extrait'])) {             
                $extrait = $_POST['extrait'];
                $db = connect();
                $jeux = chercheJeux($db, $extrait);
 
                //var_dump($extrait);
                echo "<br />";
                //var_dump($jeux);
                echo '<br /><br />'; 
                echo '<table style="text-align: left;" border="1" cellpadding="2" cellspacing="2">';
                echo '<tbody>';
                foreach ($jeux as $jeu):
                    echo '<tr><td><a href="jeu_detaillé.php?id=' . $jeu['nom'] . '">' . $jeu['nom'] . '</a></td><td> ' . $jeu['annee'] . '</td></tr><br />';
                endforeach;
                echo '</tbody></table>';
             } ?>
            <br/><br/><a href="ajout_jeu.php">Ajouter un jeu</a><br />
        </div>
     <?php 
    }
    ?>
</body>
</html>
