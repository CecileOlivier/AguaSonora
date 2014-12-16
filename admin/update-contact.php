<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Agua Sonora : Modification du texte de contact</title>
        <link href="../css/reset.css" rel="stylesheet">
        <link href="../css/admin.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script type="text/javascript" src="../js/vendor/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            plugins: [
                 "autolink link lists charmap preview hr spellchecker",
                 "searchreplace wordcount visualblocks visualchars nonbreaking",
                 "save contextmenu directionality paste"
            ],
        }); 
        </script>
    </head>
    <body>
        <header>
            <h1>Espace d'administration - Modification du texte de contact</h1>
            <a href="../session.php?logout"><input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/></a>
        </header>

        <main>


<?php

function form_valid($texte) {

    $erreurs = [];

    if(empty($texte)) {
        $erreurs[] = 'Ce champ est obligatoire ';
    }

    if(mb_strlen($texte, 'utf8') > 500) {
        $erreurs[] = 'le texte ne peut pas faire plus de 500 caractères';
    }

    if(count($erreurs)) {
        return implode(', ', $erreurs);
    }

    return true;

}

if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $contact = get_contact();
    $texte = $contact['texte'];
    if($contact) {
        // initialisation des variables
        $texte = $contact['texte'];
        strip_tags($texte, '<p><a><ul><li><h1>');
        $affichage_formulaire = true;

        // est-ce que le formulaire est renvoyé ?
        if(isset($_POST['texte'])) {
            $texte = ($_POST['texte']);

            // on valide les données
            $form_valid = form_valid($texte);
            if($form_valid === true) {
                    // on insère
                    $updatetexte = update_contact($id, $texte);
                    if($updatetexte === true) {
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
            $contact = get_contact();
            $texte = $contact['texte'];
            echo '<form id="update" method="post" action="">';
            echo '<p><textarea name="texte" id="texte">'.$texte.'</textarea></p>';
            echo'<p><input type="submit" class="btn-style" name="Modifer" value="Modifier"></p>';
            echo '</form>';
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