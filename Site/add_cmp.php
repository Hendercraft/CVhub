<?php

ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require('config.php');

$title = $_POST['title'];

if(!empty($title))
{
    $req = 'INSERT INTO dbcv.competences(intitule) VALUES (?)';
}
else
{
    echo '<h3 style="color:#ff0000;">Intitulé vide ...</h3><br>';
    sleep(2);
    require_once(ADD_CMP_P);
}

$verify = 'SELECT * FROM dbcv.competences WHERE intitule LIKE ?';


if($ver = $conn->prepare($verify))
{
    $ver->bind_param('s',$title);

    $ver->execute();

    $ver->store_result();

    if($ver->num_rows === 0)
    {
        if($stmt = $conn->prepare($req))
        {
            $stmt->bind_param('s',$title);

            $stmt->execute();

            $stmt->close();

            echo '<h3 style="color:green;">Compétence/qualification enregistrée !</h3><br>';

            require_once(ADD_CMP_P);
        }
        else
        {
            echo "Error: " . $stmt . "<br>" . $conn->error;
        }
    }
}

$conn->close();