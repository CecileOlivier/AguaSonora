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

 function get_last_date($count){
    global $connexion;
    $date = $connexion->query('SELECT id, date, heure, adresse, ville, departement FROM calendrier ORDER BY date LIMIT '.$count);
    return $date;
 }

?>