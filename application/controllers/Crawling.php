<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crawling extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // $this->account_model = edu_get_instance('account_model', 'model'); 
    }

    public function index()
    {
        // $menu = $this->config->item('menu');
        // echo '<pre>menu : '. print_r( $menu, true ) .'</pre>';
        // die();

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
        $aVdata = array();
        $aVdata['mynote'] = $aCrawlingData;

        foreach ($aVdata['mynote'] as $sKey => $oMynote) {
            $aVdata['mynote'][$sKey]->datastring = json_decode($oMynote->datastring);
            $aVdata['mynote'][$sKey]->datastring->summary = iconv_substr($aVdata['mynote'][$sKey]->datastring->contents, 0 ,50).'...';
        }

        // test code
        // echo "<!--";
        // echo "<pre>";
        // print_r($aVdata);
        // echo "</pre>";
        // echo "-->";

        $data = array(
             'vdata' => $aVdata
            ,'contents' => 'mynote/list'
        );

        $this->load->view('common/container', $data);
    }
    
    public function crawlinglist()
    {
        // test code
        $account = $this->_getAccount();

        edu_get_instance('MSGQClass');
        $aList = MSGQClass::getMsgQList($account); 

        echo "<!--";
        //print_r($aList);
        echo "-->";
        
        $data = array(
             'vdata' => $aList
            ,'contents' => 'crawling/clist'
        );

        $this->load->view('common/container', $data);

    }

    private function _getAccount()
    {
        return "1";
    }
}
