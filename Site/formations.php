<?php


require_once('config.php');
//session_start();

$output = '<!-- just a comment so php will not be mad if there is no POST -->';

/**Getting the POST VALUE in case a research has been done**/
if (isset($_POST['search'])) {
    $intitule = $_POST['intitule'];
    $niveau = $_POST['niveau'];
    $spe = $_POST['spe'];
    if ($intitule == ''){ // If the filed is empty it means it should no be take into consideration
        $intitule = '%'; //thus ='%' this way LIKE is always true this way
    }
    if ($spe == '') { // If the filed is empty it means it should no be take into consideration
        $spe = '%'; //thus ='%' this way LIKE is always true this way
    }
    if ($niveau == '') {
        $niveau = 5;
        $querypart = '(5=?)';
    }else {
        $querypart = '(`formations`.niveau = ?)';
    }
    /**Setting Up the MYSQL Query and the output string**/

    $searchformation = "SELECT * from `formations` WHERE (`formations`.intitule LIKE ?) AND $querypart AND (`formations`.spe LIKE ?) ";

    /**Executing the SQL Query and setting up the variables**/

    if($searchformation  = $conn->prepare($searchformation)){
        $searchformation->bind_param('sis',$intitule,$niveau,$spe);
        $searchformation->execute();
        $result =$searchformation->get_result();
        $output ='';
        while ($row = $result->fetch_array()) {
            $tempint = $row['intitule'];
            $templevel= $row['niveau'];
            $tempspe = $row['spe'];
            $output .= "<tr> <td>$tempint</td> <td>$templevel</td> <td>$tempspe</td> </tr>";

        }
        $searchformation->close();

    }
}


echo '<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    
    
    <style>
        table,
        td {
           border: 1px solid #333;
        }

        thead,
        tfoot {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>

<body>
<img src="img/logo.png" alt="Un magnifique logo" width="257" height="110">

<p>

<form method="post" action="formations.php">


    <h2>Rechercher des formations dans la base</h2>
    <br>
    
    
    <label for="intitule"> Intitulé: </label>
    <input name="intitule" id="intitule" type="text"/>
    
    <br>
    
    <label for="niveau">Niveau d\'étude:</label>
    <input name="niveau" id="niveau" type="text"/>

    <br>

    <label for="spe">Spécialité:</label>
    <input name="spe" id="spe" type="text"/>

    <br>

    <input name="search" id="search" class="submit-b" type="submit" value="Search"/>

    <br>

</form>
<p>



<form method="post" action="add_formation.php">


    <h2>Ajouter une formation dans la base</h2>
    <br>
    
    
    <label for="intitule"> Intitulé: </label>
    <input name="intitule" id="intitule" type="text" required="required"/>
    
    <br>
    
    <label for="niveau">Niveau d\'étude:</label>
    <input name="niveau" id="niveau" type="text" required="required"/>

    <br>

    <label for="spe">Spécialité:</label>
    <input name="spe" id="spe" type="text"/>

    <br>

    <input name="submit" id="submit" class="submit-b" type="submit" value="Submit"/>

    <br>

</form>

</p>

<!--HTML GOES--><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</p>

<p>


<table>
    <thead>
        <tr>
            <th colspan="3">Résultat de la recherche</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="col">Intitule</th>
            <th scope="col">Niveau post Bac</th>
            <th scope="col">Spécialité</th>
        </tr>
        '.$output.'
    </tbody>
</table>





</p>










</body>
</html>';
