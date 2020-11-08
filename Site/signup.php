<?php

ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php');


//Les lignes suivantes vont nous permettre de retourner une erreur si le texte rentré n'est pas conforme
if (!preg_match(" #^[a-zA-Z]+$# ",$_POST['nom'] ) || !preg_match(" #^[a-zA-Z]+$# ",$_POST['prenom'] )) {
    //ici nous indiquons que le texte toi contenir un début (#^),une fin(+$#)et ne soit composé que de lettre s
    //majuscule et minuscule([a-zA-Z])
    die ("Nom invalide: Le nom et prénom doivent uniquement être composé de lettres");
}

if ( !preg_match ( " /^.+@.+\.[a-zA-Z]{2,}$/ " ,$_POST['email'])){
    //ici l'utilisateur peut rentrer tout ce qu'il veut suivi d'un "@" puis a nouveau ce qu'il veut, puis un '.',
    // puis au moins 2 caractere constitué de lettres
    die("Email invalide: L'email doit être formé de la manière suivante: example@test.com");
}

if ( !preg_match ( " #^[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}?$# " , $_POST['tel'] ) ){
    //ici nous allons vérifer que l'utilisateur entre 5 fois une combinaison de deux chiffres:
    // et entre ces combinaisons il peut mettre un espace un itret ou rien du tout
    die("Numéro invalide: Veuillez entrez un numéro de téléphone valide");
}

if (!preg_match(" #^[a-zA-Z]+$# ",$_POST['ville'] ) ) {
    die ("Nom de ville invalide: Le nom de ville doit uniquement être composé de lettres");
}

if (!is_numeric($_POST['code_postal'] ) ) {
    die ("Code postal invalide: Le code postal doit uniquement être composé de chiffres");
}

//définition des variables qui vont nous servir à sotcker les informatiosn entré par l'utilisateur

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


$signup = 'INSERT INTO dbcv.users(nom,prenom,adresse,ville,code_postal,date_naissance,email,password,telephone,linkdin,profile_pic)
VALUES (?,?,?,?,?,?,?,?,?,?,?)';

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
            $stmt->bind_param('ssssssssssb',$nom,$firstname,$adresse,$ville,$code_postal,$fborn_date,$email,$mdp,$tel,$lnk,$profile_pic);

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
