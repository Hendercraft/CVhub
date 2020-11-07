<?php

// Initialisation of error reporting functions
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php'); //Calling config.php in order to keep the link to the db


/**Checking the data**/
if( $_POST["pname"]) {
    if (preg_match('/\d/', $_POST["$pname"])){
        die ("invalid name , name should be only composed of letters");
    }
}


/**Variables definition**/

$pname = $_POST["pname"]; // Name of the poste


/**Setting up the SQL requests**/

$addPoste = 'INSERT INTO dbcv.poste(intitule) VALUES (?)'; // SQL query to write to the db

$verify = 'SELECT * from `poste` WHERE `poste`.intitule LIKE ?'; //SQL query to check if the poste is already in the db




if($ver = $conn->prepare($verify)){ //If query was properly prepared

    $ver->bind_param('s',$pname,); //Replace the ? with the value the name user provided
    $ver->execute();
    $ver->store_result();

    if($ver->num_rows !== 0) {
        echo '<h3 style="color:#ff0000;">Le poste est dejà présent dans la base de données</h3><br>';
        require_once(POSTE_P);

    }else{
        $ver->close(); //We close the previous request
        if ($stmt = $conn->prepare($addPoste)) { //Preparing the query to add the data
            $stmt->bind_param('s',$pname,);//Binding the parameters

            $stmt->execute();

            //echo "<br>New record created successfully";
            $stmt->close();
            require_once(INDEX_P);
        } else {
            echo "Error: " . $addPoste . "<br>" . $conn->error;
        }
    }
}

$conn->close();
set_error_handler(function($number,  $message) {

    echo "Handler captured error $number: '$message'" . PHP_EOL  ;

}
);
