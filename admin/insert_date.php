<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	  	<meta charset="UTF-8">
		<title>Agua Sonora : Insertion d'une date</title>
		<link href="../css/reset.css" rel="stylesheet">
		<link href="../css/admin.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	</head>
	<body>
		<header>
			<h1>Espace d'administration - Insertion d'une date dans le calendrier</h1> 
			<a href="../session.php?logout">
				<input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/>
			</a>
		</header>

		<main>

		<div class="form_align">

		<?php
		function form_valid($jour, $heure, $adresse, $ville, $departement) {

                $erreurs = [];

                if(empty($jour) || empty($heure) || empty($adresse) || empty($ville) || empty($departement)){
                    $erreurs[] = 'tous les champs sont requis';
                }

                if(mb_strlen($jour, 'utf8') > 100) {
                    $erreurs[] = 'le titre ne peut pas faire plus de 100 caractères';
                }

                if(mb_strlen($adresse, 'utf8') > 100) {
                    $erreurs[] = 'l’auteur ne peut pas faire plus de 100 caractères';
                }

                if(mb_strlen($ville, 'utf8') < 5 && !empty($description)) {
                    $erreurs[] = 'le texte doit faire plus de 5 caractères';
                }

                if(count($erreurs)) {
                    return implode(', ', $erreurs);
                }

                return true;

            }

		// initialisation des variables qui pré-rempliront le formulaire
		$jour = $heure = $adresse = $ville = $departement = '';
		$affichage_formulaire = true;

		if(isset($_POST['date'], $_POST['heure'], $_POST['adresse'], $_POST['ville'], $_POST['departement'])){
				$jour = htmlspecialchars($_POST['date']);
				$heure = htmlspecialchars($_POST['heure']);
				$adresse = htmlspecialchars($_POST['adresse']);
				$ville = htmlspecialchars($_POST['ville']);
				$departement = htmlspecialchars($_POST['departement']);	
				$form_valid = form_valid($jour, $heure, $adresse, $ville, $departement);
                if($form_valid === true) {
					$new_date = insert_date($jour, $heure, $adresse, $ville, $departement);
					if($new_date) {
					    echo '<p class="success">La nouvelle date a été ajoutée avec succès dans le calendrier.</p>'.PHP_EOL;
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
			    <p><label for="date"># Date</label></p>
                <p><input type="date" id="date" name="date" placeholder="yyyy-mm-dd" value=""/></p>
                <p><label for="heure"># Heure</label></p>
                <p><input type="time" id="heure" name="heure" placeholder="..:..:.." value=""/></p>
			    <p><label for="adresse"># Adresse</label></p>
                <p><input type="text" id="adresse" name="adresse" placeholder="" value=""/></p>
                <p><label for="ville"># Ville</label></p>
                <p><input type="text" id="ville" name="ville" placeholder="" value=""/></p>
                <p><label for="departement"># Département</label></p>
                <p><input type="number" id="departement" name="departement" placeholder="" value=""/></p>
                <p><input type="submit" class="btn-style" name="Ajouter" value="Ajouter"></p>
            </form>

        <?php

    	}

    	?>

        </div>
		<a href="index.php"><button class="btn-style">↩ Retour</button></a>
		</main>
	</body>
</html>