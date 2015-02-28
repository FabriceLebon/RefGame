<html>
<head>
    <title>Gestion Jeux</title>
</head>
<body>

<?php
    include_once 'lib/base.php';

    $conn = connect();
    $jeux = listeTousLesjeux($conn);

    foreach ($jeux as $jeu)
    {
        echo "<p>
        <strong>Jeu</strong> : ".$jeu['NameGame']."<br />
        L'année de ce jeu est : ".$jeu['YearGame'].", et le PEGI est  ".$jeu['PEGI']." <br />
       </p>";
    }

?>

</body>
</html>
