<?php
class PdfGenerator
{
  public function generate($html, $filename='', $stream=TRUE, $paper = 'legal', $orientation = "portrait")
  {
    require_once("dompdf/dompdf_config.inc.php");
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
}
