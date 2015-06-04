<?php
    session_start();
    include_once 'lib/fonctions.php';
    include_once 'lib/base.php';
    $conn = connect();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Gestion Jeux</title>
</head>
<body>
<?php
    if (verifChampRempli($_POST['login']) and verifChampRempli($_POST['pwd'])) {
        $_SESSION['id'] = controleUtilisateur( $conn, $_POST['login'], $_POST['pwd'] );
    }

    if (!user_verified()) {
?>
        <div id="connexion">
                <form action="" method="post">
                    Veuillez saisir votre login et mot de passe :<br/>
                    <input type="text" name="login" placeholder="Pseudo:" /><br />
                    <input type="text" name="pwd" placeholder="mot de passe:" /><br/>
                    <input type="submit" value="Go" />
                </form>
        </div>
<?php
    } else {
        include_once 'lib/utilisateur.php';

        include("src/menu.php");

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


        $user = new Utilisateur();
        echo $user->getId() . "<br>";
        echo $user->getNom() . "<br>";
        session_destroy();
    }
?>

</body>
</html>
