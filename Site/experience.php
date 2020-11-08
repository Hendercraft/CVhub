<?php


require_once('config.php');
session_start();
/**Setting Up the MYSQL Query**/
$posteList = 'SELECT * from `poste`';
$enterpriseList = 'SELECT * from `entreprises`';

/**Executing the SQL Query and setting up the variables**/

if($enterpriseList = $conn->prepare($enterpriseList)){
    $enterpriseList->execute();
    $result =$enterpriseList->get_result();
    $option = '';
    while ($row = $result->fetch_array()) {
        $tempid = $row['id'];
        $tempname = $row['nom'];
        $temptwon= $row['ville'];
        $option .= "<option value = \"$tempid\" >$tempname ($temptwon)</option> ";

    }
    $enterpriseList->close();
}


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

<form method="post" action="signup.php">

     <label for="poste">Poste: </label>

     <select id="poste" required="required" name="poste">
        '.$option1.'
     </select>
     <a href="poste.html"><button type="button">Entrez un nouveau poste!</button></a>
    <br>
    
    <label for="entreprise">Entreprise: </label>

     <select id="entreprise" required="required" name="entreprise">
        '.$option.'
     </select>
    <a href="enterprise.html"><button type="button">Entrez une nouvelle entreprise!</button></a>
    <br>

    <label for="startdate">Date de début: </label>
    <input name="startdate" id="startdate" type="date" required="required"/>

    <br>

    <label for="enddate">Date de fin: </label>
    <input name="enddate" id="enddate" type="date" required="required"/>

    <br>
    <label for="submit"></label>
    <input name="submit" id="submit" class="submit-b" type="submit" value="Submit"/>

    <br>

</form>

<a href="home.html"><button type="button">Retour au menu principal</button></a>



</body>
</html>';
