<?php
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php');



$req = 'SELECT COUNT(*) from `users`';

if($stmt = $conn->prepare($req))
{
    $stmt->execute();

    $stmt->store_result();

    $stmt->bind_result($nb_users);

    $stmt->fetch();

    echo "<h3 style='color:blue'>There is $nb_users users in database </h3><br>";
}
else
{
    echo '<h3 style="color:red;">Please call upper admin</h3><br>';
}

$conn->close();
set_error_handler(function($number,  $message) {
    echo "Handler captured error $number: '$message'" . PHP_EOL  ;
});