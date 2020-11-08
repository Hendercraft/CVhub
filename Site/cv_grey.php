<?php
error_reporting(0);
session_start();
/*
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);*/



require_once('config.php');


$id = $_SESSION['id'];
$_SESSION['css_path'] = 'css/cv1.css'; //on envoie le chemin vers le fichier css correspondant dans les variables de sessions

require_once(CV_P1);



