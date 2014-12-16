<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Agua Sonora : Suppression d'un fichier son </title>
        <link href="../css/reset.css" rel="stylesheet">
        <link href="../css/admin.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    </head>
    <body>
        <header>
            <h1>Espace d'administration - Suppression d'un fichier son</h1>
            <a href="../session.php?logout"><input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/></a>
        </header>

        <main>

<?php        

if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $music = get_music_by($id);
    if($music) {
        $affichage_formulaire = true;
        // est-ce que le formulaire est renvoyé ?
        if(isset($_POST['confirm'])) {
            $resultat = delete_music($music['id']);
            if($resultat === true) {
                // succès ! \o/
                @unlink('../audio/'.$music['nom']);
                echo '<p class="success">Le fichier a été supprimé avec succès.</p><p><a href="index.php"><button class="btn-style">↩ Retour</button></a></p>'.PHP_EOL;
                $affichage_formulaire = false;
            } else {
                echo '<p class="error">Il y a eu une erreur dans la suppression : '.$resultat.', veuillez réessayer.</p>'.PHP_EOL;
            }
        }

        // on affiche le formulaire, sauf si $affichage_formulaire est à false
        if($affichage_formulaire) {
            ?>
            <form method="post" enctype="multipart/form-data">
            <p>Voulez-vous réellement supprimer le fichier <?= $music['nom']; ?> ?</p>
            <div><input type="submit" name="confirm" value="Supprimer"/> <a href="index.php"><button class="btn-style">↩ Retour</button></a></div>
            </form>
            <?php
        }
    } else {
        echo '<p class="error">Le fichier n’existe pas. <a href="index.php"><button class="btn-style">↩ Retour</button></a></p>';
    }
}else {
    echo '<p class="error">Veuillez sélectionner un fichier. <a href="index.php"><button class="btn-style">↩ Retour</button></a></p>';
}

?>
        </main>
    </body>
</html>