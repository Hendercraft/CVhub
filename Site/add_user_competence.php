<?php

session_set_cookie_params(0);
session_start();

// Initialisation of error reporting functions
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php'); //Calling config.php in order to keep the link to the db





/**Variables definition**/

$competence = $_POST['competence'];

/**Setting up the SQL requests**/

$addcompetence = 'INSERT INTO dbcv.user_competences(user_id,competences_id) VALUES (?,?)'; // SQL query to write to the db

$verify =  'SELECT * from `user_competences` WHERE (`user_competences`.user_id = ?) AND (`user_competences`.competences_id = ?)'; //SQL query to check if the formation is already in the db




if($ver = $conn->prepare($verify)){ //If query was properly prepared

    $ver->bind_param('ii',$_SESSION['id'],$competence); //Replace the ? with the value the value the user provided
    $ver->execute();
    $ver->store_result();

    if($ver->num_rows !== 0) {
        echo '<h3 style="color:#ff0000;">Vous avez dejà rentrée cette compétence professionnel!</h3><br>';
        require_once(USER_COMPETENCES_P);

    }else{
        $ver->close(); //We close the previous request
        if ($stmt = $conn->prepare($addcompetence)) { //Preparing the query to add the data
            $stmt->bind_param('ii',$_SESSION['id'],$competence);//Binding the parameters
            $stmt->execute();
            $stmt->close();
            require_once(USER_COMPETENCES_P);
            echo "Votre Compétence a bien été ajoutée";
        } else {
            echo "Error: " . $addcompetence . "<br>" . $conn->error;
        }
    }
}

$conn->close();
set_error_handler(function($number,  $message) {

    echo "Handler captured error $number: '$message'" . PHP_EOL  ;

}
);

