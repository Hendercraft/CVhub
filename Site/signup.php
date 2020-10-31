<?php

ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php');


if( $_POST["nom"] || $_POST["prenom"] ) {
    if (preg_match("/[^A-Za-z'-]/",$_POST['nom'] ) && preg_match("/[^A-Za-z'-]/",$_POST['prenom'] )) {
        die ("invalid name and name should be alpha");
    }
    echo "Welcome ". $_POST['nom']. "<br />";
    echo "You are ". $_POST['prenom']. " and i am dumb";
}
$email = $_POST['email'];
$firstname = $_POST['prenom'];
$nom = $_POST['nom'];
$tel = intval($_POST['tel']);
$adresse = $_POST['adresse'];
$lnk = $_POST['lnk'];
$mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT );
$born_date = html_entity_decode($_POST['born_date']);
$fborn_date = date('Y-m-d',strtotime($born_date));

$sql = "INSERT INTO dbcv.users(nom,prenom,adresse,date_naissance,email,password,telephone,linkdin)
VALUES ('$nom','$firstname','$adresse','$fborn_date','$email','$mdp',$tel,'$lnk')";

if ($conn->query($sql) == TRUE) {
    echo "<br>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



set_error_handler(function($number,  $message) {
    echo "Handler captured error $number: '$message'" . PHP_EOL  ;
});


require_once(INDEX_P);

//header('http://'.__ROOT__.'\index.html');
//phpinfo();
