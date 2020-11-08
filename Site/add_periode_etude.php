<?php
session_start();
// Initialisation of error reporting functions
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php'); //Calling config.php in order to keep the link to the db





/**Variables definition**/

$university = $_POST['university'];
$formation = $_POST['formation'];
$startdate = $_POST['startdate'];
$enddate =$_POST['enddate'];


/**Setting up the SQL requests**/

$addpetude = 'INSERT INTO dbcv.peridode_etude(user_id,formation_id,universite,date_d,date_f) VALUES (?,?,?,?,?)'; // SQL query to write to the db

$verify =  'SELECT * from `peridode_etude` WHERE (`peridode_etude`.user_id = ?) AND (`peridode_etude`.formation_id = ?) AND (`peridode_etude`.universite = ?) AND (`peridode_etude`.date_d LIKE ?) AND (`peridode_etude`.date_f LIKE ?)  '; //SQL query to check if the formation is already in the db




if($ver = $conn->prepare($verify)){ //If query was properly prepared

    $ver->bind_param('iiiss',$_SESSION['id'],$formation,$university,$startdate,$enddate); //Replace the ? with the value the value the user provided
    $ver->execute();
    $ver->store_result();

    if($ver->num_rows !== 0) {
        echo '<h3 style="color:#ff0000;">Vous avez dejà rentrée cette période d\'étude!</h3><br>';
        require_once(PERIODE_ETUDE_P);

    }else{
        $ver->close(); //We close the previous request
        if ($stmt = $conn->prepare($addpetude)) { //Preparing the query to add the data
            $stmt->bind_param('iiiss',$_SESSION['id'],$formation,$university,$startdate,$enddate);//Binding the parameters

            $stmt->execute();

            $stmt->close();
            require_once(PERIODE_ETUDE_P);
            echo "Votre période d\'étude a bien été ajouté";
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

