<?php
// On initialise les sessions
session_start();

// On définit le mot de pass et login
define( 'USER','username');
define( 'PASS','password');

// On récupère le formulaire
$adminUser 		= isset($_POST['adminuser'])? 		$_POST['adminuser']: 	'';
$adminPassword	= isset($_POST['adminpassword'])? 	$_POST['adminpassword']:'';
$message = 'Bienvenue sur la page d\'administration de ce site';

// Si les variables ne sont pas vides...
if( !empty( $adminUser ) && !empty( $adminPassword ) ){
	
	// On vérifie si elle corresspondent aux constantes
	if( $adminUser == USER  && $adminPassword == PASS ){
		
		// Si c'est ok, on définit la session ADMIN
		$_SESSION['admin'] = $_SERVER['REMOTE_ADDR'];
		header('Location: comments.php');
		
	} else {
		
		// Autrement => message d'erreur
		$message = '<div class="error">Nom d\'utilisateur ou mot de passe erroné(s)</div>';
		
	}
		
}

if(isset($_GET['logout'])){
	echo '1';
	session_destroy();
	header('Location: index.php');
	
}

// On déclare le mode admin
$sessionAdmin = isset($_SESSION['admin'])? '<div id="admin">Session Administrateur</div>': '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Admin Login page</title>
    <style>
body {
	background-color: #333;
	color: #CCC;
}
label {
	display: inline-block;
	width: 100px
}
a {
	color: #FFF;
}
form {
	margin: 10px;
	padding: 10px;
	border: 1px solid #CCC;
	box-shadow: #000 3px 3px 30px;
	border-radius: 6px
}
#admin {
	position: absolute;
	right: 0;
	margin: 10px
}
.error {
	background-color: #FFB7AE;
	color: #F00;
	border: #F00;
	border-radius: 6px;
	padding: 6px;
	margin-bottom: 10px
}
</style>
  </head>
  
  <body>
  <?php echo $sessionAdmin; ?>
  <div style="width:434px; margin:auto; margin-top:30px">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div style="text-align: center;"><?php echo $message; ?></div>
	  </br>
	  </br>
	<?php
	if(!$sessionAdmin){?>
      <table>
        <tr>
          <td><label>User:</label></td>
          <td><input type="text" name="adminuser" class="right" /></td>
          <td></td>
        </tr>
        <tr>
          <td><label> Password:</label></td>
          <td><input type="password" name="adminpassword" class="right"  /></td>
          <td><input type="submit" class="left" /></td>
        </tr>
      </table>

      <?php } else {
		   
	?>	
		</form>
		<form method="post" action="./info.php">
			<label for="form-title">Titre:</label>
			</br>
			<input type="text" name="title" id="form-title"/>
			</br>
			<label for="form-author">Auteur:</label>
			</br>
			<input type="text" name="author" id="form-title"/>
			</br>
			<label for="form-content">Contenu:</label>
			</br>
			<textarea name="content" id="form-content" style="max-width:350px; margin: auto;"></textarea>
			</br>
			<input type="submit" value="Envoyer" style="margin-top : 10px;">
		</form>
	  <?php echo '<a href="comments.php?logout">Logout</a>';		 
	  } ?>
	  

 </div>
  </body>
</html>