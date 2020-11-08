<?php
//include needed jpgraph classes
require 'jpgraph/jpgraph.php';
require 'jpgraph/jpgraph_line.php';

//set chart data
$datay =[0,25,12,47,27,27,0];

// Setup the graph
$graph = new Graph(350,250);
$graph->SetScale('intlin',0,$aYMax=50);

//use a predefined theme
$theme_class= new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->SetMargin(40,40,50,40);

$graph->title->Set('Inverted Y-axis');
$graph->SetBox(false);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// For background to be gradient, setfill is needed first
$graph->ygrid->SetFill(true,'#FFFFFF@0.5','#FFFFFF@0.5');
$graph->SetBackgroundGradient('#FFFFFF', '#00FF7F', GRAD_HOR, BGRAD_PLOT);

//set labels
$graph->xaxis->SetTickLabels(['G','F','E','D','C','B','A']);
$graph->xaxis->SetLabelMargin(20);
$graph->yaxis->SetLabelMargin(20);

$graph->SetAxisStyle(AXSTYLE_BOXOUT);
$graph->img->SetAngle(180); 

// Create the line
$p1 = new LinePlot($datay);
$graph->Add($p1);

$p1->SetFillGradient('#FFFFFF','#F0F8FF');
$p1->SetColor('#aadddd');

//save the graph in a file on server
$graph->Stroke('jpgraph-line_plot_inverted_y.png');