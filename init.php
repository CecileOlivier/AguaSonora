<?php 
require_once('function.php');
require_once('config.php');
session_start();
try
{
$dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset=utf8';
$utilisateur = $config['user'];
$motDePasse = $config['password'];
  $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  );
  $connexion = new PDO( $dsn, $utilisateur, $motDePasse, $options );
  $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch ( Exception $e ) {
  echo "Connexion à MySQL impossible : ", $e->getMessage();
  die();
}