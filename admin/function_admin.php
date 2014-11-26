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
 * Récupérer tous les morceaux
 * @return PDOStatement avec les colonnes id, nom, date
 */

 function get_all_music(){
    global $connexion;
    $music = $connexion->query('SELECT id, nom, date FROM audio');
    return $music;
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
 * Modifier une date selon son id
 * @param $date, $heure, $adresse, $ville, $departement, les données à insérer passées par l'utilisateur
 * @return PDOStatement une date modifiée avec les colonnes id, date, heure, adresse, ville, departement
 */

 function update_date($id, $date, $heure, $adresse, $ville, $departement){
 	global $connexion;
 	$news = $connexion->prepare('UPDATE news SET titre=:titre, texte=:texte, auteur=:auteur, image=:image WHERE id=:id');
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
 	$new_picture = $connexion->prepare('UPDATE image (id, nom) 
 									 SET (nom=:nom WHERE id=:id)');
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
 	$new_music = $connexion->prepare('UPDATE audio (id, nom) 
 									 SET (nom=:nom WHERE id=:id)');
 	$ok = $new_music->execute(array(
 		':id' => $id,
 		':nom' => $nom
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