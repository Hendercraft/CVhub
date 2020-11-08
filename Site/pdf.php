<?php

        session_start();

        require_once('config.php'); //
        require 'vendor/autoload.php';  // reference the Dompdf namespace
        use Dompdf\Dompdf;

        ob_start(); // begin collecting output

        include CV_P1;

        $html = ob_get_clean(); // retrieve output from cv file, stop buffering


        $dompdf = new Dompdf();

        //$dompdf->setBasePath(realpath(__ROOT__.'/css/cv1.css'));

        $dompdf->loadHtml($html); //intput the html file
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A3', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
?>