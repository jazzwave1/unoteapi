<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('PdfClass');

        $html = $this->load->view('welcome_message', '', true);
        // $html = $this->load->view('bookviewer_test', '', true);

        $this->dompdf->set_option('isPhpEnabled', true);

        $this->dompdf->load_html($html);

        // 가로: landscape
        // 세로: portrait
        $this->dompdf->set_paper('B5', 'portrait');

        $this->dompdf->render();

        // $canvas = $this->dompdf->get_canvas();
        // $font = Font_Metrics::get_font("helvetica", "12");
        // $canvas->page_text(500, 770, "Page {PAGE_NUM} - {PAGE_COUNT}", $font, 10, array(0,0,0));
        // $canvas->page_text(260, 770, "Canny Pack", $font, 10, array(0,0,0));
        // $canvas->page_text(43, 770, $date, $font, 10, array(0,0,0));
        // $pdf = $this->dompdf->output();

        $filename = "mypdf.pdf";

        // case 1: pdf 파일 다운로드
        $this->dompdf->stream($filename);

        // case 2: pdf 파일 서버에 저장
        // $contents = $this->dompdf->output();
        // $file_url = $_SERVER['DOCUMENT_ROOT'].'/pdf_file/'.$filename;
        // $this->save_pdf($file_url, $contents);

        // $pdf_url = 'http://'.$_SERVER['HTTP_HOST'].'/pdf_file/'.$filename;
        // echo $pdf_url;
    }

    public function save_pdf($file_url, $contents)
    {
        $pf = fopen($file_url, 'w');

        fwrite($pf, $contents);

        fclose($pf);
    }

}
