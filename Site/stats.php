<?php
    ini_set('display_errors', 1);
    ini_set('log_errors',1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    require_once('config.php');

    unlink('img/graph.png');
    unlink('img/pie.png');

    $req = 'SELECT COUNT(*) from `users`';


    if($stmt = $conn->prepare($req)){
        $stmt->execute();

        $stmt->store_result();

        $stmt->bind_result($nb_users);

        $stmt->fetch();

        echo "<h3 style='color:blue'>Il y a $nb_users utilisateurs dans la database </h3><br>";
    }
    else{
        echo '<h3 style="color:red;">Please call upper admin</h3><br>';
    }

    $req = 'SELECT COUNT(*) from `entreprises`';


    if($stmt = $conn->prepare($req)){
        $stmt->execute();

        $stmt->store_result();

        $stmt->bind_result($nb_enter);

        $stmt->fetch();

        echo "<h3 style='color:blue'>Il y a $nb_enter entreprises dans la database </h3><br>";
    }
    else{
        echo '<h3 style="color:red;">Please call upper admin</h3><br>';
    }

    $req = 'SELECT COUNT(*) from `universite`';

    if($stmt = $conn->prepare($req)){
        $stmt->execute();

        $stmt->store_result();

        $stmt->bind_result($nb_univ);

        $stmt->fetch();

        echo "<h3 style='color:blue'>Il y a $nb_univ universités dans la database </h3><br>";
    }

    else{
        echo '<h3 style="color:red;">Please call upper admin</h3><br>';
    }



    $conn->close();
    set_error_handler(function($number,  $message) {
        echo "Handler captured error $number: '$message'" . PHP_EOL  ;
    });

    //include needed jpgraph classes
    require 'jpgraph/jpgraph/jpgraph.php';
    require 'jpgraph/jpgraph/jpgraph_bar.php';

    //array with data for chart
    $datay1=[$nb_users,$nb_enter,$nb_univ];
    $datay2=[0,0,0];
    
    // Create the graph
    $graph = new Graph(500,500);
    $graph->SetScale('textlin');
    $graph->SetMarginColor('white');
    
    // Setup title
    $graph->title->Set('Utilisateurs, Entreprise et Université');
    
    // Create the first bar
    $bplot = new BarPlot($datay1);
    $bplot->SetFillGradient('AntiqueWhite2','AntiqueWhite4:0.8',GRAD_VERT);
    $bplot->SetColor('darkyellow');
    
    // Create the second bar
    $bplot2 = new BarPlot($datay2);
    $bplot2->SetFillGradient('olivedrab1','olivedrab4',GRAD_VERT);
    $bplot2->SetColor('darkgreen');
    
    // And join them in an accumulated bar
    $accbplot = new AccBarPlot([$bplot,$bplot2]);
    $graph->Add($accbplot);



    // Display the graph
    $graph->Stroke('img/graph.png');
    echo '<img src="img/graph.png">';

    //include needed jpgraph classes
    require 'jpgraph/jpgraph/jpgraph_pie.php';
    require 'jpgraph/jpgraph/jpgraph_pie3d.php';

    //image filename to save the chart
    $fimg ='img/pie.png';

    //set chart data
    $data =[$nb_enter,$nb_univ,$nb_users];

    $graph = new PieGraph(500,500);

    //customize the chart, using a predefined theme
    $theme_class= new VividTheme;
    $graph->SetTheme($theme_class);
    $graph->SetShadow();
    
    $graph->title->Set('P');
    $graph->title->SetFont(FF_FONT1,FS_BOLD);

    //define data in chart
    $p1 = new PiePlot3D($data);
    $p1->SetCenter(0.5);
    $p1->SetLegends(['Entreprise','Université','Utilisateurs']);
    $graph->legend->Pos(.088,0.9);

    //add and save the chart
    $graph->Add($p1);
    $graph->Stroke($fimg);

    //if image file created, display it
    if(file_exists($fimg)) echo '<img src="'. $fimg .'" />';
    else echo 'Unable to create: '. $fimg;

    echo '<a href="home.php"><button type="button">Retour au menu principal</button></a>';
?>
