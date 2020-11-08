<?php
//include needed jpgraph classes
require 'jpgraph/jpgraph.php';
require 'jpgraph/jpgraph_radar.php';

//arrays with labels and data for chart
$titles=['Planning','Quality','Time','RR','CR','DR'];
$data=[18, 40, 70, 90, 42,66];
 
$graph = new RadarGraph (300,280);

//define title
$graph->title->Set('Radar with marks');
$graph->title->SetFont(FF_VERDANA,FS_NORMAL,12);
 
$graph->SetTitles($titles);
$graph->SetCenter(0.5,0.55);
$graph->HideTickMarks();
$graph->SetColor('lightgreen@0.7');
$graph->axis->SetColor('darkgray');
$graph->grid->SetColor('darkgray');
$graph->grid->Show();
 
$graph->axis->title->SetFont(FF_ARIAL,FS_NORMAL,12);
$graph->axis->title->SetMargin(5);
$graph->SetGridDepth(DEPTH_BACK);
$graph->SetSize(0.6);
 
$plot = new RadarPlot($data);
$plot->SetColor('red@0.2');
$plot->SetLineWeight(1);
$plot->SetFillColor('red@0.7');
 
$plot->mark->SetType(MARK_IMG_SBALL,'red');

//adds the created plot and send it to browser
$graph->Add($plot);
$graph->Stroke();