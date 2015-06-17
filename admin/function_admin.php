<?php

/* 
 * Récupérer toutes les dates
 * @return PDOStatement avec les colonnes id, date, heure, adresse, ville, departement
 */

function get_all_date(){
	global $connexion;
	$date = $connexion->query('SELECT id, date, heure, adresse, ville, departement FROM calendrier');
	return $date;
 }

/* 
 * Récupérer une date par son id
 * @return PDOStatement avec les colonnes id, date, heure, adresse, ville, departement
 */

function get_date_by($id){
    global $connexion;
    $date = $connexion->query('SELECT id, date, heure, adresse, ville, departement FROM calendrier WHERE id = '.$connexion->quote($id))->fetch();
    return $date;
 }

/* 
 * Récupérer tous les morceaux
 * @return PDOStatement avec les colonnes id, nom, date
 */

 function get_all_music(){
    global $connexion;
    $music = $connexion->query('SELECT id, nom, date FROM audio');
    return $music;
 }

/* 
 * Récupérer une musique par son id
 * @return PDOStatement avec les colonnes id, nom
 */

function get_music_by($id){
    global $connexion;
    $music = $connexion->query('SELECT id, nom FROM audio WHERE id = '.$connexion->quote($id))->fetch();
    return $music;
 }

/* 
 * Récupérer une video par son id
 * @return PDOStatement avec les colonnes id, lien, titre
 */

function get_video_by($id){
    global $connexion;
    $video = $connexion->query('SELECT id, lien, titre FROM video WHERE id = '.$connexion->quote($id))->fetch();
    return $video;
 }

/* 
 * Insérer une nouvelle date
 * @param $date, $heure, $adresse, $ville, $departement, les données à insérer passées par l'utilisateur
 * @return PDOStatement une nouvelle date avec les colonnes id, date, heure, adresse, ville, departement
 */

 function insert_date($date, $heure, $adresse, $ville, $departement){
 	global $connexion;
 	$new_date = $connexion->prepare('INSERT INTO calendrier (date, heure, adresse, ville, departement) 
 									 VALUES (:date, :heure, :adresse, :ville, :departement)');
 	$ok = $new_date->execute(array(
 		':date' => $date,
 		':heure' => $heure,
 		':adresse' => $adresse,
 		':ville' => $ville,
 		':departement' => $departement
 		));
 	return $ok;
 }

/* 
 * Insérer un nouveau fichier image
 * @param $nom les données à insérer passées par l'utilisateur
 * @return PDOStatement une nouvelle image avec les colonnes id, nom
 */

 function insert_picture($nom){
 	global $connexion;
 	$new_picture = $connexion->prepare('INSERT INTO image (nom) 
 									 VALUES (:nom)');
 	$ok = $new_picture->execute(array(
 		':nom' => $nom
 		));
 	return $ok;
 }

/* 
 * Insérer un nouveau fichier son
 * @param $nom les données à insérer passées par l'utilisateur
 * @return PDOStatement un nouveau son avec les colonnes id, nom, date
 */

 function insert_music($nom){
 	global $connexion;
 	$new_music = $connexion->prepare('INSERT INTO audio (nom, date) 
 									 VALUES (:nom, NOW())');
 	$ok = $new_music->execute(array(
 		':nom' => $nom
 		));
 	return $ok;
 }

/* 
 * Insérer un nouveau lien vidéo
 * @param $nom les données à insérer passées par l'utilisateur
 * @return PDOStatement un nouveau lien avec les colonnes id, lien
 */

 function insert_video($lien, $titre){
    global $connexion;
    $new_video = $connexion->prepare('INSERT INTO video (lien, titre) 
                                     VALUES (:lien, :titre)');
    $ok = $new_video->execute(array(
        ':lien' => $lien,
        ':titre' => $titre
        ));
    return $ok;
 }

/* 
 * Modifier un texte selon son id
 * @param $nom les données à insérer passées par l'utilisateur
 * @return PDOStatement une nouveau texte de présentation avec les colonnes id, présentation
 */

 function update_texte($id, $texte){
    global $connexion;
    $new_texte = $connexion->prepare('UPDATE presentation SET texte=:texte WHERE id=:id');

    $ok = $new_texte->execute(array(
        ':id' => $id,
        ':texte' => $texte
        ));
    return $ok;
 }

/* 
 * Modifier une date selon son id
 * @param $date, $heure, $adresse, $ville, $departement, les données à insérer passées par l'utilisateur
 * @return PDOStatement une date modifiée avec les colonnes id, date, heure, adresse, ville, departement
 */

 function update_date($id, $date, $heure, $adresse, $ville, $departement){
 	global $connexion;
 	$new_date = $connexion->prepare('UPDATE calendrier 
 									SET id=:id, date=:date, heure=:heure, adresse=:adresse, ville=:ville, departement=:departement 
 									WHERE id=:id');
 	$ok = $new_date->execute(array(
 		':id' => $id,
 		':date' => $date,
 		':heure' => $heure,
 		':adresse' => $adresse,
 		':ville' => $ville,
 		':departement' => $departement
 		));
 	return $ok;
 }

/* 
 * Modifier un fichier image selon son id
 * @param $nom les données à insérer passées par l'utilisateur
 * @return PDOStatement une nouvelle image avec les colonnes id, nom
 */

 function update_picture($id, $nom){
 	global $connexion;
 	$new_picture = $connexion->prepare('UPDATE image SET nom=:nom WHERE id=:id');
 	$ok = $new_picture->execute(array(
 		':id' => $id,
 		':nom' => $nom
 		));
 	return $ok;
 }

/* 
 * Modifier un fichier son selon son id
 * @param $nom les données à insérer passées par l'utilisateur
 * @return PDOStatement un nouveau fichier son avec les colonnes id, nom, date
 */

 function update_music($id, $nom){
 	global $connexion;
 	$new_music = $connexion->prepare('UPDATE audio SET nom=:nom WHERE id=:id');
 	$ok = $new_music->execute(array(
 		':id' => $id,
 		':nom' => $nom
 		));
 	return $ok;
 }

 /* 
 * Modifier un lien selon son id
 * @param $nom les données à insérer passées par l'utilisateur
 * @return PDOStatement un nouveau lien avec les colonnes id, lien
 */

 function update_video($id, $lien, $titre){
    global $connexion;
    $new_video = $connexion->prepare('UPDATE video SET lien=:lien, titre=:titre WHERE id=:id');
    $ok = $new_video->execute(array(
        ':id' => $id,
        ':lien' => $lien,
        ':titre' => $titre
        ));
    return $ok;
 }

/* 
 * Modifier le texte contact selon son id
 * @param $nom les données à insérer passées par l'utilisateur
 * @return PDOStatement une nouveau texte de contact avec les colonnes id, texte
 */

 function update_contact($id, $texte){
    global $connexion;
    $new_contact = $connexion->prepare('UPDATE contact SET texte=:texte WHERE id=:id');
    $ok = $new_contact->execute(array(
        ':id' => $id,
        ':texte' => $texte
        ));
    return $ok;
 }

/* 
 * Supprimer une date du calendrier selon son id
 * @param $id identifiant de la date à supprimer sélectionnée par l'utilisateur
 * @return PDOStatement une date supprimée
 */

 function delete_date($id) {
 	global $config, $connexion;
    $date_delete = $connexion->prepare('DELETE FROM calendrier WHERE id=:id');
    $ok = $date_delete->execute(array(
    	':id' => $id
    	));
    return $ok;
 }

/* 
 * Supprimer une image selon son id
 * @param $id identifiant de l'image à supprimer sélectionnée par l'utilisateur
 * @return PDOStatement une image supprimée
 */

 function delete_picture($id) {
 	global $config, $connexion;
    $picture_delete = $connexion->prepare('DELETE FROM image WHERE id=:id');
    $ok = $picture_delete->execute(array(
    	':id' => $id
    	));
    return $ok;
 }

/* 
 * Supprimer un fichier son selon son id
 * @param $id identifiant du ficheir son à supprimer sélectionné par l'utilisateur
 * @return PDOStatement un fichier son supprimé
 */

 function delete_music($id) {
 	global $config, $connexion;
    $music_delete = $connexion->prepare('DELETE FROM audio WHERE id=:id');
    $ok = $music_delete->execute(array(
    	':id' => $id
    	));
    return $ok;
 }

/* 
 * Supprimer une vidéo selon son id
 * @param $id identifiant du ficheir son à supprimer sélectionné par l'utilisateur
 * @return PDOStatement un lien et un titre supprimés
 */

 function delete_video($id) {
    global $config, $connexion;
    $video_delete = $connexion->prepare('DELETE FROM video WHERE id=:id');
    $ok = $video_delete->execute(array(
        ':id' => $id
        ));
    return $ok;
 }

/**
 * Récupère une date à partir de son id
 * @param int $id l’identifiant de la date
 * @return array|false un tableau représentant la date, contenant les clés id, jour,
 * heure, adresse, ville, département
 */
function get_date($id) {
    global $connexion;
    $date = $connexion->query('SELECT id, date, heure, adresse, ville, departement FROM calendrier WHERE id = '.$connexion->quote($id))->fetch();
    return $date;
}

/**
 * Renvoie un nom de fichier unique pour le dossier voulu, en renommant si besoin le nom passé en paramètre.
 *
 * @param string $filename le nom de fichier.
 * @param string $dir le dossier dans lequel on cherche à enregistrer le fichier.
 * @return string un nom de fichier basé sur $filename mais qui n’existe pas.
 * encore dans le dossier (ou $filename s’il n’y a pas de doublon).
 */
function get_unique_filename($filename, $dir) {
    // si on nous fournit un $dir sans slash final, on le rajoute manuellement 
    // pour pouvoir concaténer proprement le chemin
    if(substr($dir, -1) != '/') {
        $dir .= '/';
    }
    // on extrait l’extension et le nom de base du fichier $filename, car dans 
    // la boucle qui suit, on se servira de ces 2 parties de fichier pour en 
    // calculer un nouveau, supposément unique
    $extension = strrchr($filename, '.');
    $base_filename = substr($filename, 0, -(strlen($extension)));

    // pour chaque passage dans la boucle while, on incrémentera le compteur 
    // dans le nom de fichier (exemple : image.jpg → image_2.jpg → image_3.jpg…)
    $counter = 1;

    // on cherche à vérifier l’unicité du fichier $filename ; donc, tant qu’un 
    // fichier de ce nom existe, on tente un nouveau nom.
    while(file_exists($dir.$filename)) {
        $counter++;
        // on construit un nouveau nom de fichier à partir de celui de base et 
        // du compteur, qu’on incrémente.
        $filename = $base_filename.'_'.$counter.$extension;
    }
    return $filename;
}