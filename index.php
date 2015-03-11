<html>
<head>
    <title>Gestion Jeux</title>
</head>
<body>

<?php
    include_once 'lib/base.php';
    include_once 'lib/utilisateur.php';

    $conn = connect();
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
?>

</body>
</html>
