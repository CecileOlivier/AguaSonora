<?php

/** 
 * Récupérer les dernières dates
 * @param int $count le nombre de date à récupérer
 * @return PDOStatement avec les colonnes id, date, heure, adresse, ville, departement
 */

 function get_last_date($count){
	global $connexion;
	$date = $connexion->query('SELECT id, date, heure, adresse, ville, departement FROM calendrier ORDER BY date DESC LIMIT '.$count);
	return $date;
 }

/**
 * Récupérer les anciennes dates
 * @param int $count le nombre de date à récupérer
 * @return PDOStatement avec les colonnes id, date, heure, adresse, ville, departement 
 */

 function get_other_date($count){
    global $connexion;
    $date = $connexion->query('SELECT id, date, heure, adresse, ville, departement FROM calendrier ORDER BY date LIMIT '.$count);
    return $date;
 }

/**
 * Récupérer les derniers morceaux
 * @param int $count le nombre de morceaux à récupérer
 * @return PDOStatement avec les colonnes id, nom
 */

 function get_last_music($count){
    global $connexion;
    $music = $connexion->query('SELECT id, nom, date FROM audio ORDER BY date DESC LIMIT '.$count);
    return $music;
 }

/** 
 * Récupérer les images
 * @return PDOStatement avec les colonnes id, date, heure, adresse, ville, departement
 */

 function get_pictures(){
    global $connexion;
    $pictures = $connexion->query('SELECT id, nom FROM image');
    return $pictures;
 }

/**
 * Renvoie le nombre de pages disponibles sur la galerie
 * @return int le nombre de pages
 */
function get_page_count() {
    global $connexion, $config;
    $nb_images = $connexion->query('SELECT COUNT(id) FROM image')->fetchColumn();
    $nb_pages = ceil($nb_images / $config['nb_pictures_page']);
    return $nb_pages;
}

/**
 * Renvoie la liste d'image correspondant à une page donnée
 * @param int $page le numéro de page souhaité (commençant par 0)
 * @return PDOStatement la liste des images, contenant les colonnes id, titre,
 * fichier, auteur, description, date
 */
function get_pictures_from_page($page) {
    global $config, $connexion;
    $offset = $page * $config['nb_pictures_page'];
    $list = $connexion->query('SELECT id, nom FROM image LIMIT '.$offset.','.$config['nb_pictures_page']);
    return $list;
}

/**
 * Récupère une image à partir de son id
 * @param int $id l’identifiant de l'image
 * @return array|false un tableau représentant l'image, contenant les clés id et le nom de fichier
 */
function get_pictures_by($id) {
    global $connexion;
    $pictures = $connexion->query('SELECT id, nom FROM image WHERE id = '.$connexion->quote($id))->fetch();
    return $pictures;
}

/**
 * Crée un menu HTML permettant de naviguer entre les pages
 * @param int $page le numéro de la page courante
 * @param int $page_count le nombre de pages
 * @return string le HTML correspondant au menu
 */
function menu_pagination($page, $page_count) {
    $html = '<ul class="menu">'.PHP_EOL;
    for($i = 1; $i <= $page_count; $i++) {
        if($i == $page) {
            $html .= '<li><strong>'.$i.'</strong></li>'.PHP_EOL;
        } else {
            $html .= '<li><a href="?page='.$i.'">'.$i.'</a></li>'.PHP_EOL;
        }
    }
    $html .= '</ul>'.PHP_EOL;
    return $html;
}

?>