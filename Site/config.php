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
{ //win version
    define('LOGIN_P',__ROOT__.'\login.html');
    define('INDEX_P',__ROOT__.'\index.html');
    define('SIGNUP_P',__ROOT__.'\signup.html');
    define('UNIVERSITE_P',__ROOT__.'\universite.html');
    define('ENTERPRISE_P',__ROOT__.'\enterprise.html');
    define('POSTE_P',__ROOT__.'\poste.html');
    define('HOME_P',__ROOT__.'\home.html');
    define('CV_HUB',__ROOT__.'\cvhub.html');
    define('ADD_CMP_P',__ROOT__.'\add_cmp.html');
    define('CV_P1',__ROOT__.'\cv1.html');
    define('CV_Y',__ROOT__.'\cv_yellow.html');
    define('CV_R',__ROOT__.'\cv_red.html');
    define('CV_B',__ROOT__.'\cv_blue.html');

} else { //unix versions
    define('LOGIN_P',__ROOT__.'/login.html');
    define('INDEX_P',__ROOT__.'/login.html');
    define('SIGNUP_P',__ROOT__.'/signup.html');
    define('UNIVERSITE_P',__ROOT__.'/universite.html');
    define('ENTERPRISE_P',__ROOT__.'/enterprise.html');
    define('POSTE_P',__ROOT__.'/poste.html');
    define('HOME_P',__ROOT__.'/home.html');
    define('CV_HUB',__ROOT__.'/cvhub.html');
    define('ADD_CMP_P',__ROOT__.'/add_cmp.html');
    define('CV_P1',__ROOT__.'/cv1.html');
    define('CV_Y',__ROOT__.'/cv_yellow.html');
    define('CV_R',__ROOT__.'/cv_red.html');
    define('CV_B',__ROOT__.'/cv_blue.html');
}
