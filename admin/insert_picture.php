<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	  	<meta charset="UTF-8">
		<title>Agua Sonora : Insertion d'une image</title>
		<link href="../css/reset.css" rel="stylesheet">
		<link href="../css/admin.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	</head>
	<body>
		<header>
			<h1>Espace d'administration</h1>
			<a href="../session.php?logout"><input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/></a>
		</header>

		<main>

			<h2>Insertion d'une image </h2>

            <form id="insert" method="post" action="" enctype="multipart/form-data">
                <p><label for="fichier"># Image</label></p>
                <input type="file" name="fichier" value=""/>
                <p><input type="submit" class="btn-style" name="Ajouter" value="Ajouter"></p>
            </form>

		</main>
	</body>
</html>