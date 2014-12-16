<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Agua Sonora : Modification du calendrier</title>
        <link href="../css/reset.css" rel="stylesheet">
        <link href="../css/admin.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    </head>
    <body>
        <header>
            <h1>Espace d'administration - Modification du calendrier</h1>
            <a href="../session.php?logout"><input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/></a>
        </header>

        <main>


<?php

function form_valid($date, $heure, $adresse, $ville, $departement) {

    $erreurs = [];

    if(empty($date) || empty($heure) || empty($ville)) {
        $erreurs[] = 'Ces champs sont requis ';
    }

    if(count($erreurs)) {
        return implode(', ', $erreurs);
    }

    return true;

}

if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $calendrier = get_date_by($id);
    if($calendrier) {
        // initialisation des variables
        $date = $calendrier['date'];
        $heure = $calendrier['heure'];
        $adresse = $calendrier['adresse'];
        $ville = $calendrier['ville'];
        $departement = $calendrier['departement'];
        $affichage_formulaire = true;

        // est-ce que le formulaire est renvoyé ?
        if(isset($_POST['date'], $_POST['heure'], $_POST['adresse'], $_POST['ville'], $_POST['departement'])) {
            $date = htmlspecialchars($_POST['date']);
            $heure = htmlspecialchars($_POST['heure']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $ville = htmlspecialchars($_POST['ville']);
            $departement = htmlspecialchars($_POST['departement']);

            // on valide les données
            $form_valid = form_valid($date, $heure, $adresse, $ville, $departement);
            if($form_valid === true) {
                    // on insère
                    $updatecalendar = update_date($id, $date, $heure, $adresse, $ville, $departement);
                    if($updatecalendar === true) {
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
            ?>
            <form id="update" method="post" action="">
            <p><label for="titre"># Date</label></p>
            <p><input type="text" id="date" name="date" placeholder="date" value="<?= $date ?>"/></p>
            <p><label for="titre"># Heure</label></p>
            <p><input type="text" id="heure" name="heure" placeholder="heure" value="<?= $heure ?>"/></p>
            <p><label for="titre"># Adresse</label></p>
            <p><input type="text" id="adresse" name="adresse" placeholder="adresse" value="<?= $adresse ?>"/></p>
            <p><label for="titre"># Ville</label></p>
            <p><input type="text" id="ville" name="ville" placeholder="ville" value="<?= $ville ?>"/></p>
            <p><label for="titre"># Departement</label></p>
            <p><input type="text" id="departement" name="departement" placeholder="departement" value="<?= $departement ?>"/></p>
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