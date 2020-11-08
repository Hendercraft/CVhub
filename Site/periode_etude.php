<?php


require_once('config.php');
/**Setting Up the MYSQL Query**/
$formationsList = 'SELECT * from `formations`';
$universityList = 'SELECT * from `universite`';

/**Executing the SQL Query and setting up the variables**/

if($formationsList = $conn->prepare($formationsList)){
    $formationsList->execute();
    $result =$formationsList->get_result();
    $option = '';
    while ($row = $result->fetch_array()) {
        $tempid = $row['id'];
        $tempint = $row['intitule'];
        $templevel= $row['niveau'];
        $tempspe = $row['spe'];
        $option .= "<option value = \"$tempid\" >$tempint Bac +$templevel spé $tempspe </option> ";

    }
    $formationsList->close();
}


if($universityList = $conn->prepare($universityList)){
    $universityList->execute();
    $result =$universityList->get_result();
    $option1 = '';
    while ($row = $result->fetch_array()) {
        $tempid = $row['id'];
        $tempname = $row['nom'];
        $temptown = $row['ville'];
        $option1 .= "<option value = \"$tempid\" >$tempname ($temptown)</option> ";

    }
    $universityList->close();
}


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

<form method="post" action="add_periode_etude.php">

     <label for="university">Université: </label>

     <select id="university" required="required" name="university">
        '.$option1.'
     </select>
     <a href="universite.html"><button type="button">Entrez une nouvelle universite!</button></a>

    <br>
    
    <label for="formation">Formation: </label>

     <select id="formation" required="required" name="formation">
        '.$option.'
     </select>
     <a href="formations.php"><button type="button">Entrez une nouvelle formation!</button></a>
    <br>

    <label for="startdate">Date de début: </label>
    <input name="startdate" id="startdate" type="date" required="required"/>

    <br>
    <br>
    

    <label for="enddate">Date de fin: </label>
    <input name="enddate" id="enddate" type="date" required="required"/>
    
    <br>
    <label for="submit"></label>
    <input name="submit" id="submit" class="submit-b" type="submit" value="Submit"/>

    <a href="home.html"><button type="button">Retour au menu principal</button></a>

</form>





</body>
</html>';
