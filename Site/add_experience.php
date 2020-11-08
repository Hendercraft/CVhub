<?php

// Initialisation of error reporting functions
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php'); //Calling config.php in order to keep the link to the db





/**Variables definition**/

$poste = $_POST['poste'];
$entreprise = $_POST['entreprise'];
$startdate = $_POST['startdate'];
$enddate =$_POST['enddate'];


/**Setting up the SQL requests**/

$addecperience = 'INSERT INTO dbcv.experience_pro(user_id,poste_id,entreprise_id,date_d,date_f) VALUES (?,?,?,?,?)'; // SQL query to write to the db

$verify =  'SELECT * from `experience_pro` WHERE (`formations`.user_id LIKE ?) AND (`formations`.poste_id = ?) AND (`formations`.entreprise_id LIKE ?) AND (`formations`.date_d LIKE ?) AND (`formations`.date_f LIKE ?)  '; //SQL query to check if the formation is already in the db




if($ver = $conn->prepare($verify)){ //If query was properly prepared

    $ver->bind_param('sis',$_SESSION['id'],$poste,$entreprise,$startdate,$enddate); //Replace the ? with the value the value the user provided
    $ver->execute();
    $ver->store_result();

    if($ver->num_rows !== 0) {
        echo '<h3 style="color:#ff0000;">Vous avez dejà rentrée cette expérience professionnel!</h3><br>';
        require_once(EXPERIENCE_P);

    }else{
        $ver->close(); //We close the previous request
        if ($stmt = $conn->prepare($addformation)) { //Preparing the query to add the data
            $stmt->bind_param('sis',$intitule,$niveau,$spe);//Binding the parameters

            $stmt->execute();

            $stmt->close();
            require_once(INDEX_P);
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
<?php