<?php



        require_once('config.php'); //
        require 'vendor/autoload.php';  // reference the Dompdf namespace
        use Dompdf\Dompdf;


        $html = file_get_contents(CV_P1); // getting html content to a string
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html); //intput the html file
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
?>