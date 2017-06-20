<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mynote extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // $this->account_model = edu_get_instance('account_model', 'model'); 
    }

    public function index()
    {
        // test code
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
        $data['mynote'] = $aCrawlingData;

        foreach ($data['mynote'] as $sKey => $oMynote) {
            $data['mynote'][$sKey]->datastring = json_decode($oMynote->datastring);
            $data['mynote'][$sKey]->datastring->summary = iconv_substr($data['mynote'][$sKey]->datastring->contents, 0 ,50).'...';
        }

        // test code
        // echo "<!--";
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        // echo "-->";

        $this->load->view('mynote/list', $data);
    }
    public function detail($n_idx)
    {
        // test code
        $n_idx = 1;

        // n_idx check
        if(! $n_idx )
        {
            alert('노트 정보를 찾을 수 없습니다. 잠시 후 다시 시도하세요.','/mynote');
            die;
        }

        $data = array();

        $this->load->view('mynote/detail', $data);
    }
    public function crawlinglist()
    {
        // test code
        $account = $this->_getAccount();

        edu_get_instance('MSGQClass');
        $aList = MSGQClass::getMsgQList($account); 

        // test code
        // echo "<pre>"; 
        // print_r($aList);
        
        $data = array();
        $data['aList'] = $aList;
        
        $this->load->view('mynote/listMsgq', $data);
    }

    private function _getAccount()
    {
        return "jazzwave14";
    }
}
