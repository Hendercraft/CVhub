<?php

ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php');


if( $_POST["nom"] || $_POST["prenom"] ) {
    if (preg_match("/[^A-Za-z'-]/",$_POST['nom'] ) && preg_match("/[^A-Za-z'-]/",$_POST['prenom'] )) {
        die ("invalid name , name should be only composed of letters");
    }

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

/*$sql = "INSERT INTO dbcv.users(nom,prenom,adresse,date_naissance,email,password,telephone,linkdin)
VALUES ('$nom','$firstname','$adresse','$fborn_date','$email','$mdp',$tel,'$lnk')";*/

$signup = 'INSERT INTO dbcv.users(nom,prenom,adresse,date_naissance,email,password,telephone,linkdin)
VALUES (?,?,?,?,?,?,?,?)';

$verify = 'SELECT * from `users` WHERE `users`.email LIKE ?';


if($ver = $conn->prepare($verify))
{


    $ver->bind_param('s',$email);


    $ver->execute();

    $ver->store_result();

    if($ver->num_rows !== 0)
    {
        //echo $ver->num_rows;
        echo '<h3 style="color:red;">Email déjà utilisé</h3><br>';
        require_once(SIGNUP_P);
    }
    else
    {
        echo $ver->num_rows;
        $ver->close();
        if ($stmt = $conn->prepare($signup)) {
            $stmt->bind_param('ssssssds',$nom,$firstname,$adresse,$fborn_date,$email,$mdp,$tel,$lnk);

            $stmt->execute();

            //echo "<br>New record created successfully";
            $stmt->close();
            require_once(INDEX_P);
        } else {
            echo "Error: " . $signup . "<br>" . $conn->error;
        }
    }
}




$conn->close();



set_error_handler(function($number,  $message) {
    echo "Handler captured error $number: '$message'" . PHP_EOL  ;
});




//header('http://'.__ROOT__.'\index.html');
//phpinfo();
