<?php

session_set_cookie_params(0);
session_start();

// Initialisation of error reporting functions
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


require_once('config.php');


/**Setting Up the MYSQL Query**/

$userid = $_SESSION['id'];

$exp_pro_list = "SELECT * from `experience_pro` WHERE experience_pro.user_id = $userid ";
$p_etude_list = "SELECT * from `peridode_etude` WHERE peridode_etude.user_id = $userid";
$user_comp_list = "SELECT * from `user_competences` WHERE user_competences.user_id = $userid";

/**Executing the SQL Query and setting up the variables**/

if($exp_pro_list = $conn->prepare($exp_pro_list)){
    $exp_pro_list->execute();
    $result =$exp_pro_list->get_result();
    $option = '';
    while ($row = $result->fetch_array()) {

        /**Setting Up the MYSQL Query and variable to display to the user**/
        $entrepriseid = $row['entreprise_id'];
        $posteid = $row['poste_id'];
        //$exp_pro_list->close();
        $getentreprisename = "SELECT nom,ville from `entreprises` WHERE entreprises.id = $entrepriseid";
        $getformationint = "SELECT intitule from `poste` WHERE poste.id = $posteid ";



        if ($getentreprisename = $conn->prepare($getentreprisename)){

            $getentreprisename->execute();
            $resultENT = $getentreprisename->get_result();
            while ($rowENT = $resultENT->fetch_array()){
                $nameENT = $rowENT['nom'];
                $townENT = $rowENT['ville'];
            }
            $getentreprisename->close();
        }


        if ($getformationint = $conn->prepare($getformationint)){

            $getformationint->execute();
            $resultPOSTE= $getformationint->get_result();
            while ($rowPOSTE = $resultPOSTE->fetch_array()){
                $intPOSTE = $rowPOSTE['intitule'];
            }
            $getformationint->close();
        }


        $tempstartdate = $row['date_d'];
        $tempendate = $row['date_f'];
        $tempexpproid = $row['id'];
        $option1 .= "<option value = \"$tempexpproid\">$intPOSTE chez $nameENT ($townENT) de $tempstartdate a $tempendate </option> ";

    }
    $exp_pro_list->close();
}

/**
if($posteList = $conn->prepare($posteList)){
    $posteList->execute();
    $result =$posteList->get_result();
    $option1 = '';
    while ($row = $result->fetch_array()) {
        $tempid = $row['id'];
        $tempname = $row['intitule'];
        $option1 .= "<option value = \"$tempid\" >$tempname</option> ";

    }
    $posteList->close();
}
**/

echo '<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
<img src="img/logo.png" alt="Un magnifique logo" width="257" height="110">
<p>

<form method="post" action="add_experience.php">
    <h2>Supprimer une expérience professionnel </h2>
     <label for="poste">Expérience Professionnel: </label>

     <select id="poste" required="required" name="poste">
        '.$option1.'
     </select>

    <br>
    
    <br>
    <label for="submit"></label>
    <input name="submit" id="submit" class="submit-b" type="submit" value="Submit"/>

    <br>

</form>

<form method="post" action="add_experience.php">
    <h2>Supprimer une période d\'étude </h2>
     <label for="poste">Période d\'Étude: </label>

     <select id="poste" required="required" name="poste">
        '.$option2.'
     </select>

    <br>
    
    <br>
    <label for="submit"></label>
    <input name="submit" id="submit" class="submit-b" type="submit" value="Submit"/>

    <br>

</form>

<form method="post" action="add_experience.php">
    <h2>Supprimer une compétance </h2>
     <label for="poste">Compétance: </label>

     <select id="poste" required="required" name="poste">
        '.$option3.'
     </select>

    <br>
    
    <br>
    <label for="submit"></label>
    <input name="submit" id="submit" class="submit-b" type="submit" value="Submit"/>

    <br>

</form>

<a href="home.html"><button type="button">Retour au menu principal</button></a>



</body>
</html>';
