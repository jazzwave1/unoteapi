<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PdfClass
{
    public function __construct()
    {
        // dompdf 업로드한 경로의 autoload.inc.php include
        require_once APPPATH.'third_party/Dompdf/autoload.inc.php';

        $pdf = new Dompdf\DOMPDF();
        // $pdf = new DOMPDF();
        $CI =& get_instance();
        $CI->dompdf = $pdf;
    }
}
?>