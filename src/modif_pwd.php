 <?php 
    session_start();
    include_once '../lib/fonctions.php';
 ?>
 
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion Jeux - modif pwd</title>
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
  include_once '../lib/base.php';
  
  $user = $_POST['user'];
  $pwd = sha1($_POST['pwd']);
  $db = db_connect();
  $etat = modifierPwd($db, $user, $pwd);
  var_dump($user);
  echo "<br />";
  var_dump($pwd);
  echo "<br /><br /><br />";              
  echo "Nombre de ligne(s) mise(nt) a jour : " . $etat . "<br />";
}
?>
</body>
</html>
