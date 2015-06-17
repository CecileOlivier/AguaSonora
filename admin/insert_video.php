<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	  	<meta charset="UTF-8">
		<title>Agua Sonora : Insertion d'une vidéo</title>
		<link href="../css/reset.css" rel="stylesheet">
		<link href="../css/admin.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	</head>
	<body>
		<header>
			<h1>Espace d'administration - Insertion d'une vidéo</h1> 
			<a href="../session.php?logout">
				<input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/>
			</a>
		</header>

		<main>

		<div class="form_align">

		<?php
		function form_valid($lien, $titre) {

                $erreurs = [];

                if(empty($lien) || empty($titre)){
                    $erreurs[] = 'tous les champs sont requis';
                }

                if(mb_strlen($titre, 'utf8') > 150) {
                    $erreurs[] = 'le titre ne peut pas faire plus de 100 caractères';
                }

                if(count($erreurs)) {
                    return implode(', ', $erreurs);
                }

                return true;

            }

		// initialisation des variables qui pré-rempliront le formulaire
		$lien = $titre = '';
		$affichage_formulaire = true;

		if(isset($_POST['lien'], $_POST['titre'])){
				$lien = htmlspecialchars($_POST['lien']);
				$titre = htmlspecialchars($_POST['titre']);
				$form_valid = form_valid($lien, $titre);
                if($form_valid === true) {
					$new_video = insert_video($lien, $titre);
					if($new_video) {
					    echo '<p class="success">La nouvelle vidéo a été ajoutée avec succès.</p>'.PHP_EOL;
					    echo '<a href="index.php"><button class="btn-style">↩ Retour</button></a>'.PHP_EOL;
					    $affichage_formulaire = false;
					}
					else {
					    echo '<p class="error">Il y a eu une erreur dans l’insertion, veuillez réessayer.</p>'.PHP_EOL;
					    echo '<a href="index.php"><button class="btn-style">↩ Retour</button></a>'.PHP_EOL;
					}
				} 
				else {
                    echo '<p class="error">Le formulaire est invalide : '.$form_valid.'.</p>'.PHP_EOL;
                }
		}

		// on affiche le formulaire, sauf si $affichage_formulaire est à false
		if($affichage_formulaire) {

		?>

			<form id="insert" method="post" action="">
			    <p><label for="lien"># Lien</label></p>
                <p><input type="text" id="lien" name="lien" placeholder="" value=""/></p>
                <p><label for="titre"># Titre</label></p>
                <p><input type="text" id="titre" name="titre" placeholder="" value=""/></p>
                <p><input type="submit" class="btn-style" name="Ajouter" value="Ajouter"></p>
            </form>

        <?php

    	}

    	?>

        </div>

		</main>
	</body>
</html>