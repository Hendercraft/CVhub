<?php

//Fonction pour débug ds requêtes sql et php
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


//Appelons le script de configuration
require('config.php');

//récupérons nos champs venant de la requête POST
$email = $_POST['email'];
$mdp = $_POST['mdp'];


//Verifions que les champs ne soient pas vide
if(!empty($email) && !empty($mdp))
{
    $req  = 'SELECT * FROM `users` WHERE `users`.email LIKE ?';
} else {
    echo 'email or password empty <br> redirecting ...';
    sleep(2);
    require_once(LOGIN_P);

}



if($stmt = $conn->prepare($req) and session_status() === PHP_SESSION_NONE) //Si la requête retourne un résultat et qu'aucune session n'est démarrée
{
    $stmt->bind_param('s',$email); //paramètre $email ajouté dans la requête sql

    $stmt->execute();

    $stmt->store_result();

    session_start();


    if($stmt->num_rows == 1)
    {

        $stmt->bind_result($_SESSION['id'],$_SESSION['nom'],$_SESSION['prenom'],$_SESSION['adresse'],$_SESSION['date'],$_SESSION['email'],$_SESSION['mdp'],$_SESSION['tel'],$_SESSION['lnk'],$_SESSION['profile_pic']);
        //recupération des résultats de la requête dans les variables de session
        $stmt->fetch();


        if(password_verify($mdp,$_SESSION['mdp'])) // si le mdp correspond
        {
            $_SESSION['loggedin'] = TRUE;//connecté
            require_once(INDEX_P);//retour à index.html

            //echo 'You are logged in as '.$_SESSION['nom'] .' ' .$_SESSION['prenom'] ;
        } else {
            session_unset();//supression des variables de la session précedement créée
            session_destroy();//destruction de la session précedement créée
            echo "Wrong email or password <br> Redirection...";
            sleep(2);
            require_once(LOGIN_P);
        }
    } else {
        echo "No result <br> Redirection...";
        sleep(2);
        require_once(LOGIN_P);
    }

}

elseif (session_status() === PHP_SESSION_ACTIVE && $_SESSION['loggedin'] === TRUE) //si un utilisateur est déjà connecté
{
    session_unset();
    session_destroy();
    require_once(LOGIN_P);
}

else {
    echo "We have an issue with our servers pls contact an administrator <br> Redirection...";
    sleep(2);
    require_once(INDEX_P);

}



$conn->close();
//fermeture connection avec la base de données

//affichage erreurs php
set_error_handler(function($number,  $message) {
    echo "Handler captured error $number: '$message'" . PHP_EOL  ;
});
