<?
require_once("tcpdf/tcpdf.php");
$pdf = new TCPDF();

// set document information
$pdf->SetCreator(CV_HUB);
$pdf->SetAuthor("best_amateur_CV");
$pdf->SetTitle("my doc");
$pdf->SetSubject("x");
$pdf->SetKeywords("a, b, c");


// set default header data
$pic = "/gfx/header.png";
$pdf->SetHeaderData(realpath($pic), "25", "Title");

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    //set auto page breaks
 $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

 //set image scale factor
 $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

 //set some language-dependent strings
 $pdf->setLanguageArray($l);

 //initialize document
 $pdf->AliasNbPages();

 // add a page
 $pdf->AddPage();

 // ---------------------------------------------------------

 // set font
 $pdf->SetFont("helvetica", "", 12);

 // set a background color
 $pdf->SetFillColor(230, 240, 255, true);


$pdf->SetFont("", "b", 16);
$pdf->Write(16, "some text\n", "", 0, 'C');

$pdf->Output("filename.pdf", "I");
?>