<?php
session_start();
$test = $_SESSION['nom'];
echo '<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <link rel="stylesheet" type="text/css"
        media="screen" href="cv1.css" />
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
                                <span class="c3">[Code postal, Ville]</span>
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
                                <span class="c0">photo</span>
                            </h2>
                            <img src="">
                        </td>
                    </tr>
                    <tr class="c16">
                        <td class="c18" colspan="2" rowspan="1">
                            <h1 class="c19">
                                <span class="c0">Formation</span>
                            </h1>
                            <p class="c7">
                                <span class="c3">[Nom de l&rsquo;&eacute;tablissement],</span>
                            </p>
                            <p class="c7">
                                <span class="c3">[Ville], [D&eacute;partement]</span>
                            </p>
                            <p class="c7">
                                <span class="c3">[Vous pouvez inclure ici un bref r&eacute;capitulatif des cours dispens&eacute;s ainsi que des distinctions et mentions obtenues.]</span>
                            </p>
                        </td>
                        <td class="c12" colspan="3" rowspan="1">
                            <h2 class="c14">
                                <span class="c0">Exp&eacute;rience</span>
                            </h2>
                            <p class="c2">
                                <span class="c34">[Date de d&eacute;but] &ndash; [Date de fin]</span>
                            </p>
                            <p class="c8">
                                <span class="c3">[Intitul&eacute; du poste] &bull; [Fonction] &bull; [Nom de la soci&eacute;t&eacute;]</span>
                            </p>
                            <p class="c8 c4">
                                <span class="c28"></span>
                            </p>
                            <p class="c2">
                                <span class="c34">[Date de d&eacute;but] &ndash; [Date de fin]</span>
                            </p>
                            <p class="c8"><span class="c3">[Intitul&eacute; du poste] &bull; [Fonction] &bull; [Nom de la soci&eacute;t&eacute;]</span>
                            </p>
                            <p class="c8">
                                <span class="c28">&nbsp;</span>
                            </p>
                            <p class="c2">
                                <span class="c34">[Date de d&eacute;but] &ndash; [Date de fin]</span>
                            </p>
                            <p class="c8">
                                <span class="c3">[Intitul&eacute; du poste] &bull; [Fonction] &bull; [Nom de la soci&eacute;t&eacute;]</span>
                            </p>
                            <p class="c8">
                                <span class="c28">&nbsp;</span>
                            </p>
                            <p class="c8">
                                <span class="c3">[Indiquez ici un r&eacute;capitulatif de vos principales responsabilit&eacute;s et de vos r&eacute;alisations les plus marquantes.]</span>
                            </p>
                        </td>
                    </tr>
                    <tr class="c41">
                        <td class="c18" colspan="2" rowspan="1">
                            <h1 class="c19">
                                <span class="c0">Comp&eacute;tences-cl&eacute;s</span>
                            </h1>
                            <p class="c7">
                                <span class="c3">Marketing</span>
                            </p>
                            <p class="c7">
                                <span class="c3">Gestion de projet</span>
                            </p>
                            <p class="c7">
                                <span class="c3">Planification budg&eacute;taire </span>
                            </p>
                            <p class="c7">
                                <span class="c3">R&eacute;seaux sociaux</span>
                            </p>
                            <p class="c7">
                                <span class="c3">Planification</span>
                            </p>
                        </td>
                        <td class="c12" colspan="3" rowspan="1">
                            <h2 class="c14">
                                <span class="c0">Communication</span>
                            </h2>
                            <p class="c8">
                                <span class="c3">[Vous avez effectu&eacute; une pr&eacute;sentation qui a recueilli des critiques &eacute;logieuses&nbsp;? Ne vous en cachez pas&nbsp;!</span>
                            </p>
                            <p class="c8">
                                <span class="c3">Montrez ici comment vous travaillez et interagissez avec les autres.]</span>
                            </p>
                            <p class="c8 c4">
                                <span class="c3"></span>
                            </p>
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