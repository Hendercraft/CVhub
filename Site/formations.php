<?php


require_once('config.php');
session_start();
/**Setting Up the MYSQL Query**/
$posteList = 'SELECT * from `formations` WHERE `formations`.intitule LIKE ? AND `formations`.niveau LIKE ? AND `formations`.spé LIKE ? ';



/**Getting the POST VALUE in case a research has been done**/


/**Executing the SQL Query and setting up the variables**/

if($posteList  = $conn->prepare($posteList )){
    $enterpriseList->execute();
    $ver->bind_param('s',$pname,)

}



echo '<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="main.css">
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

<form method="post" action="formation.php">


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

    <input name="submit" id="submit" class="submit-b" type="submit" value="Submit"/>

    <br>

</form>
<p>



<form method="post" action="formation.php">


    <h2>Ajouter une formation dans la base</h2>
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

    </tbody>
</table>





</p>










</body>
</html>';
