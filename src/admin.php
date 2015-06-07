 <?php 
    session_start();
    include_once '../lib/fonctions.php';
 ?>
 
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion Jeux - admin</title>
  </head>
<body>
<?php  if (!user_verified()) { ?> 
  <div id="connexion">
    <form action="/index.php" method="post">
    Veuillez saisir votre login et mot de passe :<br/>
    <input type="text" name="login" placeholder="Pseudo:" /><br />
    <input type="text" name="pwd" placeholder="mot de passe:" /><br/>
    <input type="submit" value="Go" />
    </form>
  </div>
<?php 
  } else {
  include_once 'Menu.php';
}
?>
</body>
</html>
