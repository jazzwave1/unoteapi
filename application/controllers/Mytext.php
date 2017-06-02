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

        foreach ($data['mytext'] as $sKey => $oMytext) {
            $data['mytext'][$sKey]->datastring = json_decode($oMytext->datastring);
        }

        // test code
        echo "<!--";
        print_r($data);
        echo "-->";

        $this->load->view('mytext/list', $data);
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
        
        $this->load->view('mytext/listMsgq', $data);
    }

    private function _getAccount()
    {
        return "jazzwave14";
    }
}
