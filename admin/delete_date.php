<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	  	<meta charset="UTF-8">
		<title>Agua Sonora : Suppression d'une date</title>
		<link href="../css/reset.css" rel="stylesheet">
		<link href="../css/admin.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	</head>
	<body>
		<header>
			<h1>Espace d'administration - Suppression d'une date</h1> 
			<a href="../session.php?logout">
				<input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/>
			</a>
		</header>

		<main>

		<?php

            if(isset($_GET['id'])) {
                $id = htmlspecialchars($_GET['id']);
                $calendrier = get_date_by($id);
                if($calendrier) {
                    $date = $calendrier['date'];
                    $ville = $calendrier['ville'];
                    $affichage_formulaire = true;

                    // est-ce que le formulaire est renvoyé ?
                    if(isset($_POST['confirmation'])) {
                        // on supprime
                        $old_date = delete_date($id);
                        if($old_date === true) {
                            // succès ! \o/
                            echo '<p class="success">La date du «' .$date. '» à «' .$ville. '» a été supprimée avec succès.</p>'.PHP_EOL;
                            echo '<a href="index.php"><button class="btn-style">↩ Retour</button></a>'.PHP_EOL;
                            $affichage_formulaire = false;
                        } else {
                            echo '<p class="error">Il y a eu une erreur dans la suppression : '.$old_date.', veuillez réessayer.</p>'.PHP_EOL;
                        }
                    }

                    // on affiche le formulaire, sauf si $affichage_formulaire est à false
                    if($affichage_formulaire) {
                        ?>
                        <form method="post">
                            <p>Voulez-vous réellement supprimer la date « <?= $date ?> » du calendrier ?</p>
                            <input type="submit" class="btn-style" name="confirmation" value="Supprimer"/>
                            <button class="btn-style"><a href="index.php">↩ Retour</a></button>
                        </form>
                        <?php
                    }
                } else {
                    echo '<p class="error">Fichier introuvable. <button class="btn-style"><a href="index.php">↩ Retour</a></button></p>'.PHP_EOL;
                }
            } else {
                echo '<p class="error">Veuillez choisir un fichier. <button class="btn-style"><a href="index.php">↩ Retour</a></button></p>'.PHP_EOL;
            }

            ?>

		</main>
	</body>
</html>