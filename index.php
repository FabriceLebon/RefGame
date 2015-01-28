<html>
<head>
  <title>Gestion Jeux</title>
</head>
<body>
<?php
echo "Tentative de connexion";
try{
  $conn = new PDO( "sqlsrv:Server = tcp:h8lwqxb5tn.database.windows.net,1433; Database = Game", "game_read@h8lwqxb5tn", "ReaAzu13");
  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
}
echo "Connexion reussie";/*
$reponse = $bdd->query('SELECT * FROM Jeux');
var_dump($reponse);
echo "Et la aussi"
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Jeu</strong> : <?php echo $donnees['NameGame']; ?><br />
    L'année de ce jeu est : <?php echo $donnees['YearGame']; ?>, et le PEGI est  <?php echo $donnees['PEGI']; ?> <br />
   </p>
<?php
}
$reponse->closeCursor(); // Termine le traitement de la requête*/
?>

</body>
</html>
