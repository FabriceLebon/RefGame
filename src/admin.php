 <?php session_start(); ?>
 
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion Jeux - admin</title>
  </head>
<body>
<?php  if (!user_verified()) { ?>
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
  include("src/menu.php");
}
?>
</body>
</html>
