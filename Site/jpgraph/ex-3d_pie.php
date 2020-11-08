<?php
//include needed jpgraph classes
require 'jpgraph/jpgraph.php';
require 'jpgraph/jpgraph_pie.php';
require 'jpgraph/jpgraph_pie3d.php';

//image filename to save the chart
$fimg ='jpgraph-3d_pie.png';

//set chart data
$data =[40,60,25,34];

$graph = new PieGraph(320,220);

//customize the chart, using a predefined theme
$theme_class= new VividTheme;
$graph->SetTheme($theme_class);
$graph->SetShadow();
 
$graph->title->Set('A simple 3D Pie plot');
$graph->title->SetFont(FF_FONT1,FS_BOLD);

//define data in chart
$p1 = new PiePlot3D($data);
$p1->ExplodeSlice(1); //separate slice 1
$p1->SetCenter(0.5);
$p1->SetLegends(['May','June','July','Aug']);
$graph->legend->Pos(.088,0.9);

//add and save the chart
$graph->Add($p1);
$graph->Stroke($fimg);

//if image file created, display it
if(file_exists($fimg)) echo '<img src="'. $fimg .'" />';
else echo 'Unable to create: '. $fimg;