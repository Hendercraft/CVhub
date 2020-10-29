<?php
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


session_start();


require_once('config.php');



$email = $_POST['email'];
$mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT );

echo "<br> Welcome in CVHUB , you connected yourself with $email and $mdp";

$conn->close();



set_error_handler(function($number,  $message) {
    echo "Handler captured error $number: '$message'" . PHP_EOL  ;
});