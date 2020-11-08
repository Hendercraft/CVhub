<?php

ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();
require_once('config.php');


if (!preg_match(" #^[a-zA-Z]+$# ",$_POST['nom'] ) || !preg_match(" #^[a-zA-Z]+$# ",$_POST['prenom'] )) {
    die ("Nom invalide: Le nom et prénom doivent uniquement être composé de lettres");
}

if ( !preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " ,$_POST['email'])){
    die("Email invalide: L'email doit être formé de la manière suivante: example@test.com");
}

if ( !preg_match ( " #^[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}?$# " , $_POST['tel'] ) ){
    die("Numéro invalide: Veuillez entrez un numéro de téléphone valide");
}

if (!preg_match(" #^[a-zA-Z]+$# ",$_POST['ville'] ) ) {
    die ("Nom de ville invalide: Le nom de ville doit uniquement être composé de lettres");
}

if (!is_numeric($_POST['code_postal'] ) ) {
    die ("Code postal invalide: Le code postal doit uniquement être composé de chiffres");
}

$email = $_POST['email'];

$firstname = $_POST['prenom'];

$nom = $_POST['nom'];

$tel = intval($_POST['tel']);

$adresse = $_POST['adresse'];

$ville = $_POST['ville'];

$code_postal = $_POST['code_postal'];

$lnk = $_POST['lnk'];



$profile_pic = $_FILES['img']['name'];
$convert_to_base64 = base64_encode(file_get_contents($_FILES['img']['tmp_name']));
$base64_image = "data:image/jpeg;base64,".$convert_to_base64;
$fpic = fopen($base64_image,'r');

$mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT );


$born_date = html_entity_decode($_POST['born_date']);
$fborn_date = date('Y-m-d',strtotime($born_date));

/*$sql = "INSERT INTO dbcv.users(nom,prenom,adresse,date_naissance,email,password,telephone,linkdin)
VALUES ('$nom','$firstname','$adresse','$fborn_date','$email','$mdp',$tel,'$lnk')";*/

$update = 'UPDATE dbcv.users SET nom=?,prenom=?,adresse=?,ville=?,code_postal=?,date_naissance=?,email=?,password=?,telephone=?,linkdin=?,profile_pic=?
WHERE users.id = ?';

$verify = 'SELECT * from `users` WHERE `users`.id LIKE ?';


if($ver = $conn->prepare($verify))
{


    $ver->bind_param('d',$_SESSION['id']);


    $ver->execute();

    $ver->store_result();

    if($ver->num_rows == 0)
    {
        //echo $ver->num_rows;
        echo '<h3 style="color:#ff0000;">Please Login before</h3><br>';
        require_once(LOGIN_P);
    }
    else
    {
        echo $ver->num_rows;
        $ver->close();
        if ($stmt = $conn->prepare($update)) {
            $stmt->bind_param('ssssssssssbd',$nom,$firstname,$adresse,$ville,$code_postal,$fborn_date,$email,$mdp,$tel,$lnk,$profile_pic,$_SESSION['id']);

            while (!feof($fpic))

            {

                $stmt->send_long_data(10, fread($fpic, 1048576));

            }
            fclose($fpic);
            $stmt->execute();

            //echo "<br>New record created successfully";
            $stmt->close();
            require_once(INDEX_P);
        } else {
            echo "Error: " . $update . "<br>" . $conn->error;
        }
    }
}




$conn->close();



set_error_handler(function($number,  $message) {
    echo "Handler captured error $number: '$message'" . PHP_EOL  ;
});




//header('http://'.__ROOT__.'\index.html');
//phpinfo();
