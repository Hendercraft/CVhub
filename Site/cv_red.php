<?php
session_set_cookie_params(0);
session_start();
/*
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);*/



require('config.php');


$id = $_SESSION['id'];

/*$cmp = 'SELECT intitule FROM competences c INNER JOIN  user_competences uc on c.id = uc.competences_id  WHERE uc.user_id ='.$id;
$r_cmp[0]='test';


if($stmt=$conn->query($cmp))
{
    $i=0;

    while($row = $stmt->fetch_row())
    {
        $r_cmp[$i] = $row[0];

        $i+=1;
    }
}*/

$req[0] = 'SELECT intitule FROM competences c INNER JOIN  user_competences uc on c.id = uc.competences_id  WHERE uc.user_id ='.$id;
$req[1] = 'SELECT intitule,spé,nom,date_d,date_f FROM `formations` AS f INNER JOIN `peridode_etude` AS p ON f.id = p.formation_id INNER JOIN `universite` AS u ON p.universite = u.id  WHERE p.user_id='.$id.' ORDER BY date_d DESC';
$req[2] = 'SELECT intitule,nom,ville,date_d,date_f FROM `poste` AS p INNER JOIN `experience_pro` AS exp ON p.id = exp.poste_id INNER JOIN `entreprises` AS e ON exp.entreprise_id = e.id WHERE exp.user_id = '.$id.' ORDER BY date_d DESC';
$res[0] = '';
$part[0] = '';
$row = array();
$i=0;

for($i=0;$i<3;$i+=1)
{

    if($stmt = $conn->query($req[$i]))
    {
        $num_f = $conn->field_count ; //nombre de colonnes de la réponse de la requête
        $k = 0;
        while($row = $stmt->fetch_row())
        {

            if(isset($row[0])) //si on a au moins un résultat
            {
                for($j=0;$j<$num_f;$j+=1)//pour chaque champs de chaque ligne
                {
                    $part[$k] .= "• $row[$j] "; //concaténation de chaque champs d'une ligne
                    //$part[$k] .= "• $sub_part[$j] ";
                }


            }
            else
            {
                $res[0]='';
            }
            $res[$i] .= "<br><br><p class=\"c7\"><span class=\"c3\">$part[$k]</span></p>"; // concaténation d'une ligne à l'ensemble des lignes
            $part[$k] = '';
            $k = $k + 1;


        }
    }
    $stmt->close();
}

echo '<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <link rel="stylesheet" type="text/css"
        media="screen" href="css/cv_red.css" />
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <div class="c17">
            <p class="c10 c25">
                <span class="c4"></span>
            </p>
            <p class="c5 c10">
                <span class="c4"></span>
            </p>
            <a id="t.daef249e0e1a9437778a19f541d747918b346dec">
            </a><a id="t.0"></a>
            <table class="c6">
                <tbody>
                    <tr class="c9">
                        <td class="c19" colspan="1" rowspan="1">
                            <p class="c11 c10">
                                <span class="c4"></span>
                            </p>
                            <a id="t.5f8067fcc7e87da18d7f43f33e35292002449ab1"></a>
                            <a id="t.1"></a>
                            <table class="c22">
                                <tbody>
                                    <tr class="c9">
                                        <td class="c20" colspan="1" rowspan="1">
                                            <h1 class="c13">
                                                <span class="c3">Compétences</span>
                                            </h1>
                                            <h2 class="c0">
                                                '.$res[0].'
                                            </h2>
                                        </td>
                                    </tr>
                                    <tr class="c9">
                                        <td class="c21" colspan="1" rowspan="1">
                                            <h1 class="c13">
                                                <span class="c3">
                                                    EXPERIENCES PROFESSIONNELLES
                                                </span>
                                                '.$res[2].'
                                            <h1 class="c0">
                                                <span class="c3">
                                                    FORMATIONS
                                                </span>
                                            </h1>
                                            '.$res[1].'
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="c5 c10">
                                <span class="c4"></span>
                            </p>
                        </td>
                        <td class="c15" colspan="1" rowspan="1">
                            <p class="c10 c11">
                                <span class="c4"></span>
                            </p>
                            <a id="t.930097f37bd00bfbb15187d575dfa866e5cf5f04"></a>
                            <a id="t.2"></a>
                            <table class="c6">
                                <tbody>
                                    <tr class="c9">
                                        <td class="c16" colspan="1" rowspan="1">
                                            <h1 class="c13">
                                                <span class="c3">
                                                    '.$_SESSION['prenom'].'
                                                </span>
                                                <span class="c3">'.$_SESSION['nom'].'</span>
                                            </h1>
                                            <h2 class="c0">
                                                <span class="c7">
                                                </span>
                                            </h2>
                                            <h2 class="c0">
                                                <span class="c7">
                                                </span>
                                            </h2>
                                        </td>
                                    </tr>
                                    <tr class="c9">
                                        <td class="c24" colspan="1" rowspan="1">
                                            <p class="c11 c10">
                                                <span class="c4"></span>
                                            </p>
                                            <a id="t.7600ec65e9c0409167041a3d846cacecccb86e08"></a>
                                            <a id="t.3"></a>
                                            <table class="c6">
                                                <tbody>
                                                    <tr class="c9">
                                                        <td class="c12" colspan="1" rowspan="1">
                                                            <p class="c8">
                                                                <img src="img/mail.png">
                                                            </p>
                                                        </td>
                                                        <td class="c12" colspan="1" rowspan="1">
                                                            <p class="c8">
                                                                <img src="img/tel.png">
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr class="c9">
                                                        <td class="c14" colspan="1" rowspan="1">
                                                            <p class="c5">
                                                                <span class="c4">
                                                                   '.$_SESSION['email'].'
                                                                </span>
                                                            </p>
                                                        </td>
                                                        <td class="c14" colspan="1" rowspan="1">
                                                            <p class="c5">
                                                                <span class="c4">
                                                                    '.$_SESSION['tel'].'
                                                                </span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr class="c9">
                                                        <td class="c12" colspan="1" rowspan="1">
                                                            <p class="c8">
                                                                <img src="img/linkdin.png">
                                                            </p>
                                                        </td>
                                                        <td class="c12" colspan="1" rowspan="1">
                                                            <p class="c8">
                                                                <img src="">
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr class="c9">
                                                        <td class="c1" colspan="1" rowspan="1">
                                                            <p class="c5">
                                                                <span class="c4">
                                                                    '.$_SESSION['lnk'].'
                                                                </span>
                                                            </p>
                                                        </td>
                                                        <td class="c1" colspan="1" rowspan="1">
                                                            <p class="c5">
                                                                <span class="c4">
                                                                    <img src="data:image/png;base64,'.base64_encode($_SESSION['profile_pic']) .'" />
                                                                </span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p class="c5">
                                                <span class="c4"></span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr class="c9">
                                        <td class="c2" colspan="1" rowspan="1">
                                            <span class="c4">
                                            '.$_SESSION['adresse'].' '.$_SESSION['ville'].' '.$_SESSION['code_postal'].'
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="c5 c10">
                                <span class="c4"></span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="c5">
                <span class="c18">
                    &nbsp;
                </span>
            </p>
        </div>
    </body>
</html>';