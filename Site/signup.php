<?php

ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php');



if (!preg_match(" #^[a-zA-Z]+$# ",$_POST['nom'] ) || !preg_match(" #^[a-zA-Z]+$# ",$_POST['prenom'] )) {
    die ("invalid name , name should be only composed of letters");
}

if( $_POST["email"]){
    if ( !preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " ,$_POST['email'])){
        die("invalide Email, email should be be composed like example@test.com");
    }
}
if( $_POST["tel"]){
    if ( !preg_match ( " #^[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}?$# " , $_POST['tel'] ) ){
        die("invalid phone number, please enter a valid phone number");
    }
}
$email = $_POST['email'];

$firstname = $_POST['prenom'];

$nom = $_POST['nom'];

$tel = intval($_POST['tel']);

$adresse = $_POST['adresse'];

$lnk = $_POST['lnk'];



$profile_pic = $_FILES['img']['name'];
$convert_to_base64 = base64_encode(file_get_contents($_FILES['img']['tmp_name']));
$base64_image = "data:image/jpeg;base64,".$convert_to_base64;
$fpic = fopen($base64_image,'r');

$mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT );


$born_date = html_entity_decode($_POST['born_date']);
$fborn_date = date('Y-m-d',strtotime($born_date));


$signup = 'INSERT INTO dbcv.users(nom,prenom,adresse,date_naissance,email,password,telephone,linkdin,profile_pic)
VALUES (?,?,?,?,?,?,?,?,?)';

$verify = 'SELECT * from `users` WHERE `users`.email LIKE ?';


if($ver = $conn->prepare($verify))
{


    $ver->bind_param('s',$email);


    $ver->execute();

    $ver->store_result();

    if($ver->num_rows !== 0)
    {
        //echo $ver->num_rows;
        echo '<h3 style="color:#ff0000;">Email déjà utilisé</h3><br>';
        require_once(SIGNUP_P);
    }
    else
    {
        echo $ver->num_rows;
        $ver->close();
        if ($stmt = $conn->prepare($signup)) {
            $stmt->bind_param('ssssssssb',$nom,$firstname,$adresse,$fborn_date,$email,$mdp,$tel,$lnk,$profile_pic);

            while (!feof($fpic))

            {

                $stmt->send_long_data(8, fread($fpic, 1048576));

            }
            fclose($fpic);
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
