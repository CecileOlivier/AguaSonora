<?php 
require_once('../init.php');
require_once('function_admin.php');

if(!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header('Location: ../session.php');
    die();
}