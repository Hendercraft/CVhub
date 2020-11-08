<?php

// Initialisation of error reporting functions
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php'); //Calling config.php in order to keep the link to the db


/**Checking the data**/
if( $_POST["uname"] || $_POST["town"] ) {
    if (preg_match('/\d/', $_POST["uname"]) && preg_match('/\d/', $_POST["town"])) {
        die ("invalid name , name should be only composed of letters");
    }
}


/**Variables definition**/

$uname = $_POST["uname"]; // Name of the university
$town = $_POST["town"];  // Town of the given university

/**Setting up the SQL requests**/

$addUniversity = 'INSERT INTO dbcv.universite(nom,ville) VALUES (?,?)'; // SQL query to write to the db

$verify = 'SELECT * from `universite` WHERE `universite`.nom LIKE ? AND `universite`.ville LIKE ? '; //SQL query to check if the university is already in the db




if($ver = $conn->prepare($verify)){ //If query was properly prepared

    $ver->bind_param('ss',$uname,$town); //Replace the ? with the value the name user provided
    $ver->execute();
    $ver->store_result();

    if($ver->num_rows !== 0) { //If the university already exist in the db
        echo '<h3 style="color:#ff0000;">Université dejà présente dans la base de données</h3><br>';
        require_once(UNIVERSITE_P);

    }else{
        $ver->close(); //We close the previous request
        if ($stmt = $conn->prepare($addUniversity)) { //Preparing the query to add the data
            $stmt->bind_param('ss',$uname,$town);//Binding the parameters

            $stmt->execute();

            //echo "<br>New record created successfully";
            $stmt->close();
            require_once(UNIVERSITE_P);
            echo "Votre université a bien été ajouté";
        } else {
            echo "Error: " . $addUniversity . "<br>" . $conn->error;
        }
    }
}

$conn->close();
set_error_handler(function($number,  $message) {

    echo "Handler captured error $number: '$message'" . PHP_EOL  ;

}
);


