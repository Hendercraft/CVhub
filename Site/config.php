<?php
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


define('servername','localhost');
define('username','root');
define('password','');
define('db','dbcv');

$conn = new mysqli(servername, username, password, db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully<br>";

set_error_handler(function($number,  $message) {
    echo "Handler captured error $number: '$message'" . PHP_EOL  ;
});

define('__ROOT__', dirname(__FILE__));

if(strtoupper(substr(PHP_OS, 0, 3)) == 'WIN')
{
    define('LOGIN_P',__ROOT__.'\login.html');//win version
    define('INDEX_P',__ROOT__.'\index.html');//win version
    define('SIGNUP_P',__ROOT__.'\signup.html');//win version
    define('UNIVERSITE_P',__ROOT__.'\universite.html');//win version
    define('ENTERPRISE_P',__ROOT__.'\enterprise.html');//win version
    define('CV_P',__ROOT__.'\cv.html');//win version
    define('POSTE_P',__ROOT__.'\poste.html');//win version
} else {
    define('LOGIN_P',__ROOT__.'/login.html'); //unix version
    define('INDEX_P',__ROOT__.'/login.html'); //unix version
    define('SIGNUP_P',__ROOT__.'/signup.html');//unix version
    define('UNIVERSITE_P',__ROOT__.'/universite.html');//win version
    define('ENTERPRISE_P',__ROOT__.'/enterprise.html');//win version
    define('CV_P',__ROOT__.'/cv.html');//win version
    define('POSTE_P',__ROOT__.'/poste.html');//win version

}
