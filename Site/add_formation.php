<?php

// Initialisation of error reporting functions
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php'); //Calling config.php in order to keep the link to the db





/**Variables definition**/

$intitule = $_POST['intitule'];
$niveau = $_POST['niveau'];
$spe = $_POST['spe'];


/**Checking the data**/
if (!(is_numeric($niveau))){
    die ("$niveau n'est pas valable, un nombre est attendu");
}

/**Setting up the SQL requests**/

$addformation = 'INSERT INTO dbcv.formations(intitule,niveau,spe) VALUES (?,?,?)'; // SQL query to write to the db

$verify =  "SELECT * from `formations` WHERE (`formations`.intitule LIKE ?) AND (`formations`.niveau = ?) AND (`formations`.spe LIKE ?) "; //SQL query to check if the formation is already in the db




if($ver = $conn->prepare($verify)){ //If query was properly prepared

    $ver->bind_param('sis',$intitule,$niveau,$spe); //Replace the ? with the value the value the user provided
    $ver->execute();
    $ver->store_result();

    if($ver->num_rows !== 0) {
        echo '<h3 style="color:#ff0000;">Le poste est dejà présent dans la base de données</h3><br>';
        require_once(FORMATION_P);

    }else{
        $ver->close(); //We close the previous request
        if ($stmt = $conn->prepare($addformation)) { //Preparing the query to add the data
            $stmt->bind_param('sis',$intitule,$niveau,$spe);//Binding the parameters

            $stmt->execute();

            $stmt->close();
            require_once(HOME_P);
        } else {
            echo "Error: " . $addformation . "<br>" . $conn->error;
        }
    }
}

$conn->close();
set_error_handler(function($number,  $message) {

    echo "Handler captured error $number: '$message'" . PHP_EOL  ;

}
);
