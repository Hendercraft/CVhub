<?php
$output='';
if(session_status() == PHP_SESSION_ACTIVE)
{
    if($_SESSION['loggedin'] == TRUE){
        $tempnom=$_SESSION['nom'];
        $tempprenom=$_SESSION['prenom'] ;
        $output.="Vous êtes connectés en tant que $tempnom $tempprenom" ;
        if($_SESSION['email'] == "admin@admin.admin"){
            $hidden="color: red;";
            $output .='<a href=\'stats.php\'><button> Statistiques de votre site</button></a> ';
        }
        else
        {
            $hidden="display: none;";
    }
}
else{

session_unset();
session_destroy();
$output.='You are not logged in !';

}
}
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CVHUB</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
<p>
    <br><br>
    '.$output.'
</p>
<a href="experience.php"><button type="button">Entrez une nouvelle experience professionelle</button></a>
<br><br>
<a href="periode_etude.php"><button type="button">Entrez une nouvelle université/formation</button></a>
<br><br>
<a href="user_competances.php"><button type="button">Entrez une nouvelle compétence</button></a>
<br><br>
<a href="update.html"><button type="button">Mettez à jour votre profil</button></a>
<br><br>
<a href="cvhub.html"><button type="button">Créez votre CV!</button></a>
</body>
</html>';