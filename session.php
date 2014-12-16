<?php 
require_once('init.php');

$erreur = '';

if(isset($_GET['logout'])) {
	$_SESSION = [];
}

if(isset($_POST['pass_admin'])){
	// si l'un des deux champs ou les deux sont faux
	if($_POST['pass_admin'] == $config['pass_admin']) {
		$_SESSION['admin']= true;
	}
	// sinon autoriser l'accès à admin.php avec header ("Location: admin.php");
	else{
		$_SESSION['admin'] = false;
		$erreur = 'Mot de passe incorrect';
	}
}

// si il existe une session admin > redirection vers l'administration
if(isset($_SESSION['admin']) && $_SESSION['admin']){
	header ('Location: admin/index.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	  	<meta charset="UTF-8">
		<title>Agua Sonora : connexion à l'espace d'administration</title>
		<link href="css/reset.css" rel="stylesheet">
		<link href="css/admin.css" rel="stylesheet">
	</head>
	<body class="session">
	<?php
	echo '<p class="accueil">Veuillez entrer un mot de passe pour vous connecter :</p>
		 '.$erreur.'
		  <form id="connexion" action="" method="post">'.
		  '<p><input type="password" name="pass_admin" id="pass_admin" placeholder="Mot de passe"/>
		  <input type="submit" class="btn-style" name="submit" value="Valider"></p>
	      </form>';
	?>
	</body>
</html>