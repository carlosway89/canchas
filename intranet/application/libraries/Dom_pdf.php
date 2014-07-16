<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dom_pdf {
    
    public function __construct() {
        require_once('dompdf/dompdf_config.inc.php');
    }

    function pdf_create($nombre, $html, $filename = '', $tamanio, $orientacion, $stream = TRUE) {
        if (isset($html)) {
            $html = stripslashes($html);
            $dompdf = new DOMPDF();
            $dompdf->load_html($html);
            $dompdf->set_paper($tamanio, $orientacion);
            $dompdf->render();
            if ($stream) {
                //$dompdf->stream($filename.".pdf");
                $pdf = $dompdf->output();
                file_put_contents("uploads/TRAMINT/PDFS/" . $nombre . ".pdf", $pdf);
            } else {
                //$pdf = $dompdf->output();
            }
        }
    }

    function pdf_create_licencias($html, $filename = '', $name, $stream = TRUE, $tamanio = "A4", $orientacion = "portrait") {
        if (isset($html)) {
            $html = stripslashes($html);
            $dompdf = new DOMPDF();
            $dompdf->set_paper($tamanio, $orientacion);
            $dompdf->load_html($html);
            $dompdf->render();
            if ($stream) {
                $dompdf->stream($name . ".pdf");
                $pdf = $dompdf->output();
                file_put_contents("uploads/" . $filename . ".pdf", $pdf);
                return $dompdf->output();
            }
        }
    }

}

?>