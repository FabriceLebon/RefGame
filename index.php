<html>
<head>
  <title>Gestion Jeux</title>
</head>
<body>

<?php
echo "<br>Tentative de connexion<br>";
try{
  $conn = new PDO( "sqlsrv:Server = tcp:h8lwqxb5tn.database.windows.net,1433; Database = Game", "game_read@h8lwqxb5tn", "ReaAzu13");
  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
}

echo "<br>Connexion reussie<br>";
$sql = "SELECT * FROM Jeux";
$reponse = $conn->query($sql);
var_dump($reponse);
echo "<br>Resultat requete stockee<br>";
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Jeu</strong> : <?php echo $donnees['NameGame']; ?><br />
    L'année de ce jeu est : <?php echo $donnees['YearGame']; ?>, et le PEGI est  <?php echo $donnees['PEGI']; ?> <br />
   </p>
<?php
}
echo "<br>Resultat requete affichee<br>";
$reponse->closeCursor(); // Termine le traitement de la requête
?>

</body>
</html>
