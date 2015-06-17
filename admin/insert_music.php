<?php 
require_once('init.php');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	  	<meta charset="UTF-8">
		<title>Agua Sonora : Insertion d'un fichier son</title>
		<link href="../css/reset.css" rel="stylesheet">
		<link href="../css/admin.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	</head>
	<body>
		<header>
			<h1>Espace d'administration - Insertion d'un fichier son</h1>
			<a href="../session.php?logout">
				<input type="button" name="btn" class="btn-style deco" value="Déconnexion" title="Déconnexion"/>
			</a>
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

$affichage_formulaire = true;
if(isset($_POST['Inserer'])) {
	$fichier = null;
	if(isset($_FILES['fichier'])) {
		$fichier = $_FILES['fichier'];
	}

    // validation des données
	$form_valid = form_valid($fichier);
	if($form_valid === true) {
		$upload_ok = true;
		if($fichier !== null && is_uploaded_file($fichier['tmp_name'])) {
            // on traite l’upload
			if(move_uploaded_file($fichier['tmp_name'], '../audio/'.$fichier['name'])) {
			} else {
				$upload_ok = false;
			}
		}
		if($upload_ok) {
            // insertion
			$new_music = insert_music($fichier['name']);
			if($new_music === true) {
                // OK
				echo '<p class="success">Insertion réussie.</p><p><a href="index.php"><button class="btn-style">↩ Retour</button></a></p>'.PHP_EOL;
				$affichage_formulaire = false;
			} else {
				echo '<p class="error">Il y a eu une erreur dans : '.$new_music.', veuillez réessayer.</p>'.PHP_EOL;
			}
		} else {
			echo '<p class="error">Il y a eu une erreur dans l’envoi de l’image, veuillez réessayer.</p>'.PHP_EOL;
		}
	} else {
		echo '<p class="error">Le formulaire est invalide : '.$form_valid.'.</p>'.PHP_EOL;
	}
}

// affichage du formulaire, sauf si $affichage_formulaire est à false
if($affichage_formulaire) {
	?>
	<form id="update" method="post" action="" enctype="multipart/form-data">
		<p><label for="fichier"># Son</label></p>
		<input type="file" name="fichier" value=""/>
		<p><input type="submit" class="btn-style" name="Inserer" value="Insérer"></p>
	</form>
	<?php
}
    

?>
		</main>
	</body>
</html>