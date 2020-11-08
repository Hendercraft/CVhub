<?php

// Initialisation of error reporting functions
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php'); //Calling config.php in order to keep the link to the db


/**Checking the data**/
if( $_POST["ename"] || $_POST["town"] ) {
    if (preg_match('/\d/', $_POST["ename"]) && preg_match('/\d/', $_POST["town"])) {
        die ("invalid name , name should be only composed of letters");
    }
}


/**Variables definition**/

$ename = $_POST["ename"]; // Name of the enterprise
$town = $_POST["town"];  // Town of the given enterprise

/**Setting up the SQL requests**/

$addEnterprise = 'INSERT INTO dbcv.entreprises(nom,ville) VALUES (?,?)'; // SQL query to write to the db

$verify = 'SELECT * from `entreprises` WHERE `entreprises`.nom LIKE ? AND `entreprises`.ville LIKE ?'; //SQL query to check if the enterprise is already in the db




if($ver = $conn->prepare($verify)){ //If query was properly prepared

    $ver->bind_param('ss',$ename,$town); //Replace the ? with the value the name user provided
    $ver->execute();
    $ver->store_result();

    if($ver->num_rows !== 0) { //If the enterprise already exist in the db
        echo '<h3 style="color:#ff0000;">L\'entrerpise dejà présente dans la base de données</h3><br>';
        require_once(ENTERPRISE_P);

    }else{
        $ver->close(); //We close the previous request
        if ($stmt = $conn->prepare($addEnterprise)) { //Preparing the query to add the data
            $stmt->bind_param('ss',$ename,$town);//Binding the parameters

            $stmt->execute();

            //echo "<br>New record created successfully";
            $stmt->close();
            require_once(HOME_P);
        } else {
            echo "Error: " . $addEnterprise . "<br>" . $conn->error;
        }
    }
}

$conn->close();
set_error_handler(function($number,  $message) {

    echo "Handler captured error $number: '$message'" . PHP_EOL  ;

}
);
