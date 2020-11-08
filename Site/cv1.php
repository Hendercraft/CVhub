<?php
error_reporting(0);
session_start();
/*
ini_set('display_errors', 1);
ini_set('log_errors',1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);*/



require_once('config.php');


$id = $_SESSION['id'];

$css = file_get_contents($_SESSION['css_path']);

$req[0] = 'SELECT intitule FROM competences c INNER JOIN  user_competences uc on c.id = uc.competences_id  WHERE uc.user_id ='.$id;
$req[1] = 'SELECT intitule,spe,nom,date_d,date_f FROM `formations` AS f INNER JOIN `peridode_etude` AS p ON f.id = p.formation_id INNER JOIN `universite` AS u ON p.universite = u.id  WHERE p.user_id='.$id.' ORDER BY date_d DESC';
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





//var_dump($_SESSION['profile_pic']);
$html = '<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <style>'.$css.'</style>
    </head>
    <body>
        <div class="c32">
      
            <p class="c9 c4">
                <span class="c22"></span>
            </p>
            <a id="t.0237e9c4dc1083b1eae3686549c102a1e811fb98"></a>
            <a id="t.0"></a>
            <table class="c24">
                <tbody>
                    <tr class="c37">
                        <td class="c38" colspan="1" rowspan="1">
                            <p class="c2 c4">
                                <span class="c1"></span>
                            </p>
                        </td>
                        <td class="c6" colspan="3" rowspan="1">
                            <p class="c14 title">
                                <span>'.$_SESSION['prenom'].'</span>
                                <span class="c46">'.$_SESSION['nom'].'</span>
                            </p>
                            <p class="c14 subtitle">
                                <span class="c44">g&eacute;rant adjoint </span>
                            </p>
                        </td>
                        <td class="c21" colspan="1" rowspan="1">
                            <p class="c2 c4">
                                <span class="c1"></span>
                            </p>
                        </td>
                    </tr>
                    <tr class="c27">
                        <td class="c15" colspan="2" rowspan="1">
                            <p class="c2 c4">
                                <span class="c1"></span>
                            </p>
                        </td>
                        <td class="c43" colspan="1" rowspan="1">
                            <p class="c2 c4">
                                <span class="c1"></span>
                            </p>
                        </td>
                        <td class="c5" colspan="2" rowspan="1">
                            <p class="c2 c4">
                                <span class="c1"></span>
                            </p>
                        </td>
                    </tr>
                    <tr class="c25">
                        <td class="c18" colspan="2" rowspan="1">
                            <h1 class="c19">
                                <span class="c0">Coordonn&eacute;es</span>
                            </h1>
                            <p class="c7">
                                <span class="c3">'.$_SESSION['adresse'].'</span>
                            </p>
                            <p class="c7">
                                <span class="c3">'.$_SESSION['ville'].' | ['.$_SESSION['code_postal'].']</span>
                            </p>
                            <p class="c7">
                                <span class="c3">'.$_SESSION['tel'].'</span>
                            </p>
                            <p class="c7">
                                <span class="c3">'.$_SESSION['email'].'</span>
                            </p>
                            <p class="c7">
                                <span class="c3">'.$_SESSION['lnk'].'</span>
                            </p>
                            <p class="c4 c7">
                                <span class="c3"></span>
                            </p>
                        </td>
                        <td class="c35" colspan="3" rowspan="1">
                            <h2 class="c14">
                                <img src="data:image/png;base64,'.base64_encode($_SESSION['profile_pic']) .'" />
                                
                            </h2>
                        </td>
                    </tr>
                    <tr class="c16">
                        <td class="c18" colspan="2" rowspan="1">
                            <h1 class="c19">
                                <span class="c0">Formation</span>
                            </h1>
                            '.$res[1].'
                            
                            
                            
                    
                        </td>
                        <td class="c12" colspan="3" rowspan="1">
                            <h2 class="c14">
                                <span class="c0">Exp&eacute;rience</span>
                            </h2>
                            
                           '.$res[2].'
                        </td>
                    </tr>
                    <tr class="c41">
                        <td class="c18" colspan="2" rowspan="1">
                            <h1 class="c19">
                                <span class="c0">Comp&eacute;tences - Qualifications</span>
                            </h1>
                            '.$res[0].'
                            <br>
                            
                        </td>
                        
                    </tr>                   
                </tbody>
            </table>
            <p class="c2 c4">
                <span class="c10"></span>
            </p>
            <div>
                <p class="c2 c4">
                    <span class="c10"></span>
                </p>
            </div>
        </div>
    </body>
</html>';
require_once('pdf.php');
echo $html;

$conn->close();