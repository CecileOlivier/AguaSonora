<?php

/* 
 * Récupérer les dernières dates
 * @param int $count le nombre de date à récupérer
 * @return PDOStatement avec les colonnes id, date, heure, adresse, ville, departement
 */

 function get_last_date($count){
	global $connexion;
	$date = $connexion->query('SELECT id, date, heure, adresse, ville, departement FROM calendrier ORDER BY date DESC LIMIT '.$count);
	return $date;
 }

 /* 
 * Récupérer les anciennes dates
 * @param int $count le nombre de date à récupérer
 * @return PDOStatement avec les colonnes id, date, heure, adresse, ville, departement 
 */

 function get_other_date($count){
    global $connexion;
    $date = $connexion->query('SELECT id, date, heure, adresse, ville, departement FROM calendrier ORDER BY date LIMIT '.$count);
    return $date;
 }

 /* 
 * Récupérer les derniers morceaux
 * @param int $count le nombre de morceaux à récupérer
 * @return PDOStatement avec les colonnes id, nom
 */

 function get_last_music($count){
    global $connexion;
    $music = $connexion->query('SELECT id, nom, date FROM audio ORDER BY date DESC LIMIT '.$count);
    return $music;
 }

 /* 
 * Récupérer les images
 * @return PDOStatement avec les colonnes id, date, heure, adresse, ville, departement
 */

 function get_pictures(){
    global $connexion;
    $pictures = $connexion->query('SELECT id, nom FROM image');
    return $pictures;
 }

?>