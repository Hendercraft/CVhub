<?
require_once("tcpdf/tcpdf.php");
    function convert(){
        require_once("tcpdf/tcpdf.php");
        $pdf = new PDF();
        $pdf->AliasNbPages(1);
        $pdf->SetCreator(CV_HUB);
        $pdf->SetTitle("my cv");
        $pdf->SetAuthor("best_amateur_CV");
        $pdf->setLanguageArray($l);
        $pdf->Output("my_cv.pdf", "PDF");
    }
?>