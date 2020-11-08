<?php
//include needed jpgraph classes
require 'jpgraph/jpgraph.php';
require 'jpgraph/jpgraph_bar.php';

//array with data for chart
$datay1=[13,8,19,7,17,6];
$datay2=[4,5,2,7,5,25];

// Create the graph
$graph = new Graph(350,250);
$graph->SetScale('textlin');
$graph->SetMarginColor('white');
 
// Setup title
$graph->title->Set('Acc bar with gradient');
 
// Create the first bar
$bplot = new BarPlot($datay1);
$bplot->SetFillGradient('AntiqueWhite2','AntiqueWhite4:0.8',GRAD_VERT);
$bplot->SetColor('darkred');
 
// Create the second bar
$bplot2 = new BarPlot($datay2);
$bplot2->SetFillGradient('olivedrab1','olivedrab4',GRAD_VERT);
$bplot2->SetColor('darkgreen');
 
// And join them in an accumulated bar
$accbplot = new AccBarPlot([$bplot,$bplot2]);
$graph->Add($accbplot);

// Display the graph
$graph->Stroke();