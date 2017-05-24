<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mytext extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // $this->account_model = edu_get_instance('account_model', 'model'); 
    }

    public function index()
    {
        // testcode
        $usn = 1;

        // usn check
        if(! $usn )
        {
            alert('로그인 후 이용하세요.','/login');
            die;
        }

        // 크롤링 된 데이터 db에서 가져오기
        $cra  = edu_get_instance('CrawlingClass');
        $oCra = new $cra();

        $aCrawlingData = $oCra->getCrawling($usn);

        // test code
        // dumy data
        $data = array();
        $data['mytext'] = $aCrawlingData;

        // test code
        echo "<!--";
        print_r($data);
        echo "-->";

        $this->load->view('mytext/list', $data);
    }

}
