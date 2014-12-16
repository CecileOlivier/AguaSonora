<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Agua Sonora : Modification des morceaux</title>
        <link href="../css/reset.css" rel="stylesheet">
        <link href="../css/admin.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    </head>
    <body>
        <header>
            <h1>Espace d'administration - Modification des morceaux</h1>
            <a href="../session.php?logout"><input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/></a>
        </header>

        <main>


<?php

function form_valid($fichier=null) {

    $erreurs = [];

    if($fichier!=null && is_uploaded_file($fichier['tmp_name'])) {
        // définition d'un tableau de typemime autorisés
        $array_mimetype = [ "audio/mpeg3",
                            "audio/x-mpeg-3",
                            "audio/mpeg",
                            "audio/mp3",
                            "application/ogg"
                          ];
        $array_extensions = [ ".mp3",
                              ".ogg"
                            ];
        // récupération du type mime de l'image avec finfo_file
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $fichier['tmp_name']);
        if(!in_array($mimetype,$array_mimetype)) {
            $erreurs[] = 'Le nom de fichier invalide, les formats autorisés sont :'
            .implode(',',$array_mimetype);
        }
        // récupération de l'extension de l'image
        $extension = strtolower(strrchr($fichier['name'],'.'));
        if(!in_array($extension,$array_extensions)) {
            $erreurs[] = "L'extension de fichier est invalide, les extensions autorisées sont :"
            .implode(',',$array_extensions);
        }

    }

    if(count($erreurs)) {
        return implode(', ', $erreurs);
    }

    return true;

}

if(isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $music = get_music_by($id);
    if($music) {
        // initialisation des variables qui pré-rempliront le formulaire
        $nom = $music['nom'];
        $affichage_formulaire = true;

        // est-ce que le formulaire est renvoyé ?
        if(isset($_POST['Modif'])) {
            $fichier = null;
            if(isset($_FILES['fichier'])) {
                $fichier = $_FILES['fichier'];
            }

            // on valide les données
            $form_valid = form_valid($fichier);
            if($form_valid === true) {
                $upload_ok = true;
                if($fichier !== null && is_uploaded_file($fichier['tmp_name'])) {
                    // on traite l’upload
                    //$nom = get_unique_filename($fichier['name'], '../audio/');
                    if(move_uploaded_file($fichier['tmp_name'], '../audio/'.$fichier['name'])) {
                    } else {
                        $upload_ok = false;
                    }
                }
                if($upload_ok) {
                    // on insère
                    $music_update = update_music($id, $fichier['name']);
                    if($music_update === true) {
                        // succès ! \o/
                        echo '<p class="success">Mise à jour réussie.</p><p><a href="index.php"><button class="btn-style">↩ Retour</button></a></p>'.PHP_EOL;
                        $affichage_formulaire = false;
                    } else {
                        echo '<p class="error">Il y a eu une erreur dans la mise à jour : '.$music_update.', veuillez réessayer.</p>'.PHP_EOL;
                    }
                } else {
                    echo '<p class="error">Il y a eu une erreur dans l’envoi de l’image, veuillez réessayer.</p>'.PHP_EOL;
                }
            } else {
                echo '<p class="error">Le formulaire est invalide : '.$form_valid.'.</p>'.PHP_EOL;
            }
        }

        // on affiche le formulaire, sauf si $affichage_formulaire est à false
        if($affichage_formulaire) {
            ?>
            <form id="update" method="post" action="" enctype="multipart/form-data">
                <p><label for="fichier"># Musique</label></p>
                <p><input type="text" id="nom" name="nom" placeholder="nom" value="<?= $nom ?>"/></p>
                <input type="file" name="fichier" value=""/>
                <p><input type="submit" class="btn-style" name="Modif" value="Modif"></p>
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
        </div>
    </body>
</html>