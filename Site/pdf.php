<?php
        require 'vendor/autoload.php';
        require_once 'dompdfS/dompdf/autoload.inc.php';
        // reference the Dompdf namespace
        use Dompdf\Dompdf;

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
?>