<?php

// Initialisation of error reporting functions
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once('config.php');



if (isset($_POST['supprexp'])) {
    $expid = $_POST['exp'];

    $delete = 'DELETE from `experience_pro` WHERE experience_pro.id = ?';
    if ($delete = $conn->prepare($delete)) {
        $delete->bind_param('i', $expid);
        $delete->execute();
        $delete->close;
    }
}

if (isset($_POST['suppretude'])) {
    $etudeid = $_POST['etude'];

    $delete = 'DELETE from `peridode_etude` WHERE peridode_etude.id = ?';
    if ($delete = $conn->prepare($delete)) {
        $delete->bind_param('i', $etudeid);
        $delete->execute();
        $delete->close;
    }
}

if (isset($_POST['supprcomp'])) { //We don't have a primary key here
    $comstreing = $_POST['comp'];
    $len = strlen($comstreing);
    $i = 0;
    $userid = '';
    $compid ='';
    while ($comstreing[$i] !=','){ //So we parse the Post valeu to get both user ID and com ID
        $userid .= $comstreing[$i];
        $i++;
    }
    $i++;
    while ($comstreing[$i] < $len){
        $compid .= $comstreing[$i];
        $i++;
    }
    //This way we can form a primary key
    $delete = 'DELETE from `user_competences` WHERE user_competences.user_id = ? AND user_competences.competences_id = ?';
    if ($delete = $conn->prepare($delete)) {
        $delete->bind_param('ii', $userid,$compid);
        $delete->execute();
        $delete->close;
    }
}