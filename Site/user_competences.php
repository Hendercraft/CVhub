<?php


require_once('config.php');
/**Setting Up the MYSQL Query**/
$competenceList = 'SELECT * from `competences`';

/**Executing the SQL Query and setting up the variables**/

if($competenceList = $conn->prepare($competenceList)){
    $competenceList->execute();
    $result =$competenceList->get_result();
    $option = '';
    while ($row = $result->fetch_array()) {
        $tempid = $row['id'];
        $tempint = $row['intitule'];
        $option .= "<option value = \"$tempid\" >$tempint</option> ";

    }
    $competenceList->close();
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

<form method="post" action="add_user_competence.php">

     <label for="competence">Compétence: </label>

     <select id="competence" required="required" name="competence">
        '.$option.'
     </select>
     <a href="add_cmp.html"><button type="button">Entrer une nouvelle Compétence!</button></a>

    <br>
    <label for="submit"></label>
    <input name="submit" id="submit" class="submit-b" type="submit" value="Submit"/>

    <br>

</form>

<a href="home.php"><button type="button">Retour au menu principal</button></a>



</body>
</html>';
