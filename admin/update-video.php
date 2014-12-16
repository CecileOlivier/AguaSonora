<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Agua Sonora : Modification d'une video</title>
        <link href="../css/reset.css" rel="stylesheet">
        <link href="../css/admin.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    </head>
    <body>
        <header>
            <h1>Espace d'administration - Modification d'une video</h1>
            <a href="../session.php?logout"><input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/></a>
        </header>

        <main>


<?php

function form_valid($lien, $titre) {

    $erreurs = [];

    if(empty($titre)) {
        $erreurs[] = 'Ce champ est obligatoire ';
    }

    if(mb_strlen($titre, 'utf8') > 200) {
        $erreurs[] = 'le texte ne peut pas faire plus de 200 caractères';
    }

    if(count($erreurs)) {
        return implode(', ', $erreurs);
    }

    return true;

}

if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $video = get_video_by($id);
    if($video) {
        // initialisation des variables
        $lien = $video['lien'];
        $titre = $video['titre'];
        $affichage_formulaire = true;

        // est-ce que le formulaire est renvoyé ?
        if(isset($_POST['lien'], $_POST['titre'])) {
            $lien = $_POST['lien'];
            $titre = htmlspecialchars($_POST['titre']);

            // on valide les données
            $form_valid = form_valid($lien, $titre);
            if($form_valid === true) {
                    // on insère
                    $up_video = update_video($id, $lien, $titre);
                    if($up_video === true) {
                        echo '<p class="success">Mise à jour réussie.</p><p><a href="index.php"><button class="btn-style">↩ Retour</button></a></p>'.PHP_EOL;
                        $affichage_formulaire = false;
                    } else {
                        echo '<p class="error">Il y a eu une erreur dans la mise à jour, veuillez réessayer.</p>'.PHP_EOL;
                    }
            } else {
                echo '<p class="error">Le formulaire est invalide : '.$form_valid.'.</p>'.PHP_EOL;
            }
        }

        if($affichage_formulaire) {
            $video = get_video_by($id);
            $lien = $video['lien'];
            $titre = $video['titre'];

            ?>
            <form id="update" method="post" action="">
            <p><label for="titre"># Lien</label></p>
            <p><input type="text" id="lien" name="lien" placeholder="lien" value="<?= $lien ?>"/></p>
            <p><label for="titre"># Titre</label></p>
            <p><input type="text" id="titre" name="titre" placeholder="titre" value="<?= $titre ?>"/></p>
            <p><input type="submit" class="btn-style" name="Modifer" value="Modifier"></p>
            </form>
            <?php
        }
    } else {
        echo '<p class="error">Fichier introuvable. <a href="index.php"><button class="btn-style">↩ Retour</button></a></p>'.PHP_EOL;
    }
} else {
    echo '<p class="error">Veuillez choisir un fichier. <a href="index.php"><button class="btn-style">↩ Retour</button></a></p>'.PHP_EOL;
}

?>
    </body>
</html>