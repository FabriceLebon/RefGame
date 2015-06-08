<?php
    session_start();
    include_once './lib/fonctions.php';
    include_once './lib/base.php';
    include_once './lib/utilisateur.php';
    $conn = connect();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion Jeux - home</title>
</head>
<body>
<?php
    if (verifChampRempli($_POST['login']) and verifChampRempli($_POST['pwd'])) {
        $_SESSION['id'] = controleUtilisateur( $conn, $_POST['login'], $_POST['pwd'] );
        echo "connexion en cours...";
        if (user_verified()) {
            echo "Connexion validé ...";
            if ($utilisateur == null) {
                echo "Creation utilisateur " . $_POST['login'] . " ...";
                $utilisateur = new Utilisateur();
            }            
            $utilisateur->setId($_SESSION['id']);
            $utilisateur->setNom($_POST['login']);
        } else {
            echo "Erreur connexion...";
            session_destroy();
        }

    }

    if (!user_verified()) {
?>
        <div id="connexion">
                <form action="" method="post">
                    Veuillez saisir votre login et mot de passe :<br/>
                    <input type="text" name="login" placeholder="Pseudo:" /><br />
                    <input type="password" name="pwd" placeholder="mot de passe:" /><br/>
                    <input type="submit" value="Go" />
                </form>
        </div>
<?php
    } else {
        include_once '/src/menu.php';

        $jeux = listeTousLesjeux($conn);

        foreach ($jeux as $jeu)
        {
            echo "<p>
            <strong>Jeu</strong> : ".$jeu['NameGame']."<br />
            L'année de ce jeu est : ".$jeu['YearGame'].", et le PEGI est  ".$jeu['PEGI']." <br />
           </p>";
        }

        $utilisateurs = listeUtilisateurs($conn);
        echo '<select name="user">',"\n";
        $selected = '';
        foreach ($utilisateurs as $user)
        {
            if ($user['nom'] === 'Belbaf')
            {
                $selected = ' selected="selected"';
            }
            echo "\t",'<option value="',$user['id'],'"', $selected ,'>',$user['nom'],'</option>',"\n";
            $selected = '';
        }
        echo '</select><br>',"\n";
        echo "ID : " . $utilisateur->getId() . "<br>";
        echo "Pseudo : " . $utilisateur->getNom() . "<br>";
    }
?>

</body>
</html>
